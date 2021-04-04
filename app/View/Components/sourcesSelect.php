<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sourcesSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        // value passed in order to recycle it
        $this->name = $name
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sources-select');
    }
}
