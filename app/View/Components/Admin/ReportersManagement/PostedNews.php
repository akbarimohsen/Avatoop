<?php

namespace App\View\Components\Admin\ReportersManagement;

use Illuminate\View\Component;

class PostedNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.reporters-management.posted-news');
    }
}
