<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
/*
    dd(request());
 */
        $inputs=request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' =>['string', 'max:255'],
            'avatar' => ['file:png,jpeg,gif'],
            'currency_id' => ['required'],
            'language_id' => ['required']
        ]);
        $user=auth()->user();
        if (request('avatar')) {
            $path=request('avatar')->store('public/images/custom');
            $inputs['avatar']= substr($path,21);
        }
        /*
        dd($inputs);
         */
        $user->update($inputs);

        session()->flash("div_class", "success");
        session()->flash("message", __("User settings updated"));
        return redirect()->route("home");
    }

    public function changepassword() {
        $inputs=request()->validate([
            'password' => ['min:5', 'max:255', 'confirmed' ]
        ]);
        /*
        dd($inputs);
         */
        $inputs['password']=Hash::make($inputs['password']);
        $user=auth()->user()->update($inputs);
        session()->flash("div_class", "success");
        session()->flash("message", __("User password updated"));
        return redirect()->route("home");
    }




}
