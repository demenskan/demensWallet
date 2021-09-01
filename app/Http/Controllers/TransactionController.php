<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Transaction;
use App\Label;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    //
    function capture() {
        return view('transactions.capture', [ "labels" => auth()->user()->labels()->get() ]);
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
        dd(request()->all());
        /*
        $flash_messages= [];
        request()->validate([
            'amount' => 'required|numeric',
            'origin' => 'different:destiny',
            'destiny' => 'different:origin',
            'operation-timestamp' => 'required'
        ]);
        if (request('origin')!="INCOME") {
            // Valid for resource-resource & resource-outcome
            //--Reduces balance of origin resource
            $resource_origin=Resource::findOrFail(request('origin'));
            if ($resource_origin->transactionsAfter(request('operation-timestamp'))->count()>0) {
                $resource_origin->transactions_sorted=false;
                $flash_messages[]= [ 'text' => __("There are operations dated after this one. The resource ".$resource_origin->alias."  will be marked down as altered"), 'style' => 'warning' ];
                $resultant_balance=null;
            }
            else {
                $resultant_balance=$resource_origin->balance-request('amount');
                $resource_origin->balance=$resultant_balance;
            }
            $resource_origin->update();
            Transaction::create([
                'id' => Str::uuid(),
                'resource_id' => request('origin'),
                'alter_resource_id' => request('destiny'),
                'amount' => request('amount'),
                'resultant_balance' => $resultant_balance,
                'description' => request('description'),
                'type' => "OUT",
                'operation_timestamp' => request('operation-timestamp'),
                'category_id' => request('category'),
                'operator_id' => auth()->user()->id,
                'notes' => request('notes'),
            ]);
        }
        if (request('destiny')!="OUTCOME") {
            // Valid for income-resource & resource-resource
            // Increase balance of destination resource
            $resource_destiny=Resource::findOrFail(request('destiny'));
            if ($resource_destiny->transactionsAfter(request('operation-timestamp'))->count()>0) {
                $resource_destiny->transactions_sorted=false;
                $flash_messages[]= [ 'text' => __("There are operations dated after this one. The resource ".$resource_destiny->alias."  will be marked down as altered"), 'style' => 'warning' ];
                $resultant_balance=null;
            }
            else {
                $resultant_balance=$resource_destiny->balance+request('amount');
                $resource_destiny->balance=$resultant_balance;
            }
            $resource_destiny->update();
            $transaction_id=Str::uuid();
            Transaction::create([
                'id' => $transaction_id,
                'resource_id' => request('destiny'),
                'alter_resource_id' => request('origin'),
                'amount' => request('amount'),
                'resultant_balance' => $resultant_balance,
                'description' => request('description'),
                'type' => "IN",
                'operation_timestamp' => request('operation-timestamp'),
                'category_id' => request('category'),
                'operator_id' => auth()->user()->id,
                'notes' => request('notes'),
            ]);
            if (request('hiddenLabels')!="") {
                $labels=explode("|",request('hiddenLabels'));
                $transaction=Transaction::Find($transaction_id);
                foreach ($labels as $label_id) {
                    $label=Label::Find($label_id);
                    $label->transactions()->attach($transaction);
                }
            }
        }
        $flash_messages[]= [ 'text' => __('Transaction created'), 'style' => 'success' ];
        session()->flash('flash-messages', $flash_messages);
        return back();
         */
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
        return view ("components.transactions.categories-select",  [ 'categories' => $categories, 'show_uncategorized' => true ]);
    }

    function populate_parent_categories($type) {
        if ($type=="IN") {
            $categories=auth()->user()->categoriesIncome;
        }
        else {
            $categories=auth()->user()->categoriesOutcome;
        }
        return view ("components.transactions.categories-select",  [ 'categories' => $categories, 'show_uncategorized' => false ]);
    }
}
