<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $showBreadcrumbs;
    public $showCategories;
    public $fullwidth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showCategories = false, $showBreadcrumbs = false, $fullwidth = false)
    {
        $this->showCategories = $showCategories;
        $this->showBreadcrumbs = $showBreadcrumbs;
        $this->fullwidth = $fullwidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.app');
    }
}
