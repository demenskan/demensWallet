<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use App\Language;

class UserController extends Controller
{
    //
    public function profile() {
        $user=auth()->user();
        $currencies=Currency::all();
        $languages=Language::all();
        return view('users.profile', [ "currencies" => $currencies, "languages" => $languages, "user" => $user ]);
    }

    public function store() {
        dd(request());
        $user=auth()->user();
        $user->language_id=request('language');
        $user->currency_id=request('currency');
        $user->name=request('name');
        $user->update();

    }

    public function changepassword() {
        echo ('pass xchange');
    }




}
