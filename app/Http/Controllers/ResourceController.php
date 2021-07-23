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
            [ "resource_types" => Resource_type::all(), 
              "currencies" => Currency::all(), "images" => Icon::all()
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
        if (request('radio-icon')=='gallery') {
            $inputs['icon_id']=request('hdnGalleryImage');
        }
        // Falta la parte para las imagenes subidas
        $inputs['currency_id']=request('currency_id');
        $inputs['balance']=request('initial_amount');
        /*
            dd(request());
         */
        auth()->user()->resources()->create($inputs);
        // Crea una transaccion inicial para ajuste de saldo
        Transaction::create([
            'id' => Str::uuid(),
            'resource_id' => $inputs["id"],
            'alter_resource_id' => "INCOME",
            'amount' => request('initial_amount'),
            'resultant_balance' => request('initial_amount'),
            'description' => __("Initial amount"),
            'type' => "IN",
            'operator_id' => auth()->user()->id,
            'notes' => __("Initial amount")
        ]);

        session()->flash("message", __("Resource created"));
        return redirect()->route("resources.admin");
    }



}
