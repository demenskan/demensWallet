<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Icon;

class IconController extends Controller
{
    //
    function admin() {
        $icons=auth()->user()->icons()->paginate(5);
        //dd($resources);
        return view('icons.administrate', [ "icons" => $icons ]);
    }


    function create() {
        return view('icons.create');
    }

    function edit($icon_id) {
        $icon=Icon::findOrFail($icon_id);
        return view('icons.edit', [ 'icon' => $icon ]);
    }

    function update() {
        $inputs=request()->validate([
            'icon_tag' => "required"
        ]);
        $icon=Icon::findOrFail(request('id'));
        $icon->tag=request('icon_tag');
        $icon->update();
        session()->flash("div_class", "success");
        session()->flash("message", __("Icon updated"));
        return redirect()->route("icons.administrate");
    }

    function store() {
        $inputs=request()->validate([
            'icon_tag' => "required"
        ]);
        // Ver notas en el proyecto de cms
        //'post_image' => "mimes:png,jpeg,gif",
        if(request('post_image')) {
            $path=request('post_image')->store('public/images/custom');
            $new_icon=Icon::create([
                'id' => Str::uuid(),
                'filename' =>  substr($path,21),  //parche para que le quite la parte de la carpeta
                'type' => 'custom',
                'user_id' => auth()->user()->id,
                'tag' => request('icon_tag')
            ]);
        }
        session()->flash("message", __("Icon created"));
        return redirect()->route("icons.administrate");
    }
}
