<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAppliance;

class UserAppliancesController extends Controller
{
    //
    public function manage() {
        //$appliances=UserAppliance::all()->paginate(20);
        //dd($resources);
        if (auth()->user()->profile=="SU") {
            $appliances=UserAppliance::all();
            return view('appliances.list', [ "appliances" => $appliances ]);
        }
        else {
            echo "You didn't say the magic word!";
        }
    }

    public function action() {
        dd(request());
    }
}
