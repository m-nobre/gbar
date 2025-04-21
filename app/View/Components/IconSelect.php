<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;
use Illuminate\Support\Collection;


class IconSelect extends Component
{
    public $icons;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $source = file_get_contents(public_path("/media/app/icons.json"));

        $this->icons = $source;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon-select')->with('icons', $this->icons);
    }
}
