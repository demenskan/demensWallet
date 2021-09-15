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
        $month_subtotals=[];
        $resources=auth()->user()->resources;
        $charData="[";
        foreach ($resources as $resource) {
            
            $month_subtotals[$resource->alias]=[ '01' => 0, '02' => 0, '03' => 0, '04' => 0,
                                                 '05' => 0, '06' => 0, '07' => 0, '08' => 0,
                                                 '09' => 0, '10' => 0, '11' => 0, '12' => 0];
            $incoming_operations=$resource->fluxesYear('IN', date("Y"))->get();
            //dd($incoming_operations);
            foreach($incoming_operations as $transaction) {
                $month_subtotals[$resource->alias][substr($transaction->operation_timestamp,5,2)]+=$transaction->amount;
            }
        }
/*
        $charData.= ($month==1) ? $montly[$month] : ",".$montly[$month];
        $charData.= "]";
*/
        //$charData="[ 3000,3000,5000,7000,8000,9000,3000,2000, 0,0,0,0 ]";
        dd($month_subtotals);
        //return view('reports.incomes', [ 'charData' => $charData] );
    }
}
