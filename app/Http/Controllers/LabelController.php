<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Label;

class LabelController extends Controller
{
    //
    function admin() {
        $labels=auth()->user()->labels()->paginate(10);
        return view('labels.administrate', [ "labels" => $labels ]);
    }

    function create() {
        return view('labels.create');
    }

    function edit($label_id) {
        $label=Label::findOrFail($label_id);
        return view('labels.edit', [ 'label' => $label ]);
    }

    function update() {
        $inputs=request()->validate([
            'name' => "required"
        ]);
        $label=Label::findOrFail(request('id'));
        $label->name=request('name');
        $label->fontawesome_id=request('fontawesome_id');
        $label->foreground_color=request('foreground_color');
        $label->background_color=request('background_color');
        $label->update();
        session()->flash("div_class", "success");
        session()->flash("message", __("Label updated"));
        return redirect()->route("labels.administrate");
    }


    function store() {
        /*
        dd(request());
         */
        $inputs=request()->validate([
            'name' => "required"
        ]);
        $new_label=Label::create([
                'id' => Str::uuid(),
                'user_id' => auth()->user()->id,
                'name' =>  request('name'),
                'foreground_color' => request('foreground_color'),
                'background_color' => request('background_color'),
                'fontawesome_id' => request('fontawesome_id')
            ]);
        session()->flash("div_class", "success");
        session()->flash("message", __("Label created"));
        return redirect()->route("labels.administrate");
    }
}
