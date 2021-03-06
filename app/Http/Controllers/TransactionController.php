<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Transaction;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    //
    function capture() {
        return view('transactions.capture');
    }

    function detail($id) {
        $transaction=Transaction::findOrFail($id);
        switch ($transaction->alter_resource_id) {
            case "INCOME":
                $transaction->alter_resource_alias= __("General Income");
                break;
            case "OUTCOME":
                $transaction->alter_resource_alias= __("General Outcome");
                break;
            default:
                $transaction->alter_resource_alias= $transaction->alter_resource->alias ;
                break;
        }
        return view("transactions.detail", [ "transaction" => $transaction ]);
    }

    function store() {
        //Origen y destino deben ser diferentes
        //cantidad es requerida y numerica
        //El usuario debe ser propietario de, o tener permisos de escritura en los 2 recursos
        request()->validate([
            'amount' => 'required|numeric',
            'origin' => 'different:destiny',
            'destiny' => 'different:origin'
        ]);
        if (request('origin')!="INCOME") {
            // Valid for resource-resource & resource-outcome
            //--Reduces balance of origin resource
            $resource_origin=Resource::findOrFail(request('origin'));
            $resource_origin->balance-=request('amount');
            $resource_origin->update();
            Transaction::create([
                'id' => Str::uuid(),
                'resource_id' => request('origin'),
                'alter_resource_id' => request('destiny'),
                'amount' => request('amount'),
                'resultant_balance' => $resource_origin->balance,
                'description' => request('description'),
                'type' => "OUT",
                'category_id' => request('category'),
                'operator_id' => auth()->user()->id,
                'notes' => request('notes'),
            ]);
        }
        if (request('destiny')!="OUTCOME") {
            // Valid for income-resource & resource-resource
            // Increase balance of destination resource
            $resource_destiny=Resource::findOrFail(request('destiny'));
            $resource_destiny->balance+=request('amount');
            $resource_destiny->update();
            Transaction::create([
                'id' => Str::uuid(),
                'resource_id' => request('destiny'),
                'alter_resource_id' => request('origin'),
                'amount' => request('amount'),
                'resultant_balance' => $resource_destiny->balance,
                'description' => request('description'),
                'type' => "IN",
                'category_id' => request('category'),
                'operator_id' => auth()->user()->id,
                'notes' => request('notes'),
            ]);
        }

        session()->flash('message-text', __('Transaction created'));
        session()->flash('message-style','success');
        return back();
    }

    function find() {
        return view('transactions.find');
    }

    function results() {
        dd(request());
    }

    function all() {
        $transactions=auth()->user()->transactions()->paginate(10);
        return view('transactions.list', [ "transactions" => $transactions ]);
    }

    function populate_categories($origin, $destiny) {
        if (($origin!="INCOME")&&($destiny!="OUTCOME"))
            return view ("extras.alert",  [ 'message' => __("Internal movement"), 'style' => "info" ]);
        if ($destiny=="NOSELECT")
            return view ("extras.alert",  [ 'message' => __("You must select a destiny resource"), 'style' => "warning" ]);
        if ($origin=="NOSELECT")
            return view ("extras.alert",  [ 'message' => __("You must select an origin resource"), 'style' => "warning" ]);
        if (($origin=="INCOME")&&($destiny=="OUTCOME"))
            return view ("extras.alert",  [ 'message' => __("Invalid operation. You must select at least one resource") ]);

        if ($origin=="INCOME") {
            $categories=auth()->user()->categoriesIncome;
        }

        if ($destiny=="OUTCOME") {
            $categories=auth()->user()->categoriesOutcome;
        }
        return view ("components.transactions.categories-select",  [ 'categories' => $categories ]);
    }

    function populate_parent_categories($type) {
        if ($type=="IN") {
            $categories=auth()->user()->categoriesIncome;
        }
        else {
            $categories=auth()->user()->categoriesOutcome;
        }
        return view ("components.transactions.categories-select",  [ 'categories' => $categories ]);
    }
}
