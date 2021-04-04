<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    //
    function store($name, $type, $parent, $token) {
        if (($token=="")||($token!=csrf_token()))
            return __("Invalid token:".$token);

        //return "name: $name type: $type parent: $parent token: $token ";
        /*request()->validate([
            'name' => 'required',
            'type' => 'required',
        ]);*/
        Category::create([
            'id' => Str::uuid(),
            'parent_id' => request('category'),
            'user_id' => auth()->user()->id,
            'name' => request('name'),
            'type' => request('type'),
        ]);
        session()->flash('message-text', __('Category created'));
        session()->flash('message-style','success');
        return "ok";
    }
}
