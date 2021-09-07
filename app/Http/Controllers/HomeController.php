<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resources=auth()->user()->resources;
        $total_balances=[];
        $earnings=[];
        $expenses=[];
        foreach ($resources as $resource) {
            // Total balance
            if (array_key_exists($resource->currency_id, $total_balances))
                $total_balances[$resource->currency_id]+=$resource->balance;
            else
                $total_balances[$resource->currency_id]=$resource->balance;
            // Earnings by month
            $total_earnings=0;
            $incoming_operations=$resource->fluxesMonth(date('m'),date('Y'),'IN')->get();
            //dd($incoming_operations);
            foreach($incoming_operations as $operation) {
                $total_earnings+=$operation->amount;
            }
            if (array_key_exists($resource->currency_id, $earnings))
                $earnings[$resource->currency_id]+=$total_earnings;
            else
                $earnings[$resource->currency_id]=$total_earnings;
            // Expenses by month
            $total_expenses=0;
            $outgoing_operations=$resource->fluxesMonth(date('m'),date('Y'),'OUT')->get();
            //dd($outgoing_operations);
            foreach($outgoing_operations as $operation) {
                $total_expenses+=$operation->amount;
            }
            if (array_key_exists($resource->currency_id, $expenses))
                $expenses[$resource->currency_id]+=$total_expenses;
            else
                $expenses[$resource->currency_id]=$total_expenses;
        }
       /*
        dd($earnings);
        */
        return view('home', [
            'total_balances' => $total_balances,
            'earnings' => $earnings,
            'expenses' => $expenses
        ]);
    }
}
