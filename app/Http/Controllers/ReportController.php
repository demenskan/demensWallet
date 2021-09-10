<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index() {
        echo ("LOL");
    }

    public function incomes() {
        $montly=[ 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        $resources=auth()->user()->resources;
        $charData="[";
        foreach ($montly as $month => $subtotal) {
            foreach ($resources as $resource) {
                $incoming_operations=$resource->fluxesMonth($month,date('Y'),'IN');
                foreach($incoming_operations as $operation) {
                    $montly[$month]+=$operation->amount;
                }
            }
            $charData.= ($month==1) ? $montly[$month] : ",".$montly[$month];
        }
        $charData.= "]";
        //$charData="[ 3000,3000,5000,7000,8000,9000,3000,2000, 0,0,0,0 ]";
        return view('reports.incomes', [ 'charData' => $charData] );
    }
}
