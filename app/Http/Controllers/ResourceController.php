<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Resource;
use App\Resource_type;
use App\Currency;
use App\Transaction;
use App\Icon;

class ResourceController extends Controller
{
    //
    function list() {
        $resources=auth()->user()->resources()->paginate(5);
        //dd($resources);
        return view('resources.list', [ "resources" => $resources ]);
    }

    function detail($id) {
        $resource=Resource::findOrFail($id);
        //dd ($transactions);
        return view('resources.detail', [ "resource" => $resource, "transactions" =>$resource->transactions()->paginate(5) ]);
    }

    function administrate() {
        $resources=auth()->user()->resources()->paginate(5);
        //dd($resources);
        return view('resources.administrate', [ "resources" => $resources ]);
    }

    function create() {
/*
        dd(File::files(public_path("storage/images")));
 */
        return view('resources.create',
            [
                "resource_types" => Resource_type::all(),
                "currencies" => Currency::all(),
                "images" => Icon::all()
            ]
        );
    }

    function edit($resource_id) {
        $resource=Resource::findOrFail($resource_id);
        return view('resources.edit',
            [
              "resource_types" => Resource_type::all(),
              "currencies" => Currency::all(),
              "images" => Icon::all(),
              "resource" => $resource
            ]
        );
    }

    function store() {
        $inputs=request()->validate([
            'alias' => "required",
            'initial_amount' => "numeric"
        ]);
        $inputs['id']=Str::uuid();
        $inputs['resource_type_id']=request('resource_type_id');
        $inputs['icon_id']=request('icon');
        $inputs['currency_id']=request('currency_id');
        $inputs['balance']=request('initial_amount') ?? 0;  //Null Coalescing operator PHP7
        /*
            dd(request());
         */
        auth()->user()->resources()->create($inputs);
        // Crea una transaccion inicial para ajuste de saldo
        //
        if ($inputs['balance']!=0) {
            Transaction::create([
                'id' => Str::uuid(),
                'resource_id' => $inputs["id"],
                'alter_resource_id' => "INCOME",
                'amount' => request('initial_amount'),
                'resultant_balance' => request('initial_amount'),
                'description' => __("Initial amount"),
                'operation_timestamp' => date('Y-m-d H:i:s'),
                'type' => "IN",
                'operator_id' => auth()->user()->id,
                'notes' => __("Initial amount")
            ]);
        }
        session()->flash("div_class", "success");
        session()->flash("message", __("Resource created"));
        return redirect()->route("resources.admin");
    }

    function update() {
        $inputs=request()->validate([
            'alias' => "required"
        ]);
        $resource=Resource::findOrFail(request('resource_id'));
        $resource->resource_type_id=request('resource_type_id');
        $resource->icon_id=request('icon');
        $resource->alias=request('alias');
        $resource->currency_id=request('currency_id');
        $resource->active=(request('active')=="on") ? true : false;
        $resource->update();
        session()->flash("div_class", "success");
        session()->flash("message", __("Resource updated"));
        return redirect()->route("resources.admin");
    }

    function resequence($id) {
        $results= [];
        $resource=Resource::findOrFail($id);
        $first_inserted_transaction=$resource->transactions()->whereNull('resultant_balance')->first();
        $transactions_to_update=$resource->transactionsAfter($first_inserted_transaction->operation_timestamp)->get();
        //dd($transactions_to_update);
        // Checks if the inserted transaction is the first one or not.
        $transaction_before=$resource->transactionsBefore($first_inserted_transaction->operation_timestamp)->first();
        if (isset($transaction_before))
            $base_balance=$transaction_before->resultant_balance;
        else
            $base_balance=0;
        // Updates the resultant balance of the inserted transaction
        if ($first_inserted_transaction->type=="IN")
            $base_balance+=$first_inserted_transaction->amount;
        else
            $base_balance-=$first_inserted_transaction->amount;
        $results[] = [
            'id' => $first_inserted_transaction->id,
            'operation_timestamp' => $first_inserted_transaction->operation_timestamp,
            'description' => $first_inserted_transaction->description,
            'type' => $first_inserted_transaction->type,
            'amount' => $first_inserted_transaction->amount,
            'old_balance' => $first_inserted_transaction->resultant_balance,
            'new_balance' => $base_balance
        ];
        $first_inserted_transaction->resultant_balance=$base_balance;
        $first_inserted_transaction->update();
        // Updates the rest of transactions
        foreach ($transactions_to_update as $transaction) {
            if ($transaction->type=="IN")
                $base_balance+=$transaction->amount;
            else
                $base_balance-=$transaction->amount;
            $results[] = [
                'id' => $transaction->id,
                'operation_timestamp' => $transaction->operation_timestamp,
                'description' => $transaction->description,
                'type' => $transaction->type,
                'amount' => $transaction->amount,
                'old_balance' => $transaction->resultant_balance,
                'new_balance' => $base_balance
            ];
            $transaction->resultant_balance=$base_balance;
            $transaction->update();
        }
        //Updates the resource's balance
        $resource->balance=$base_balance;
        $resource->transactions_sorted=true;
        $resource->update();
        //$first_inserted_transaction=$resource->transactions()->first();
        //dd ($first_inserted_transaction->operation_timestamp);
        return view('resources.resequence', [ "results" =>$results ]);
    }



}
