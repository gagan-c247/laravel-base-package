<?php

namespace C247\Codebank\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortIcon extends Component
{
    // example of implementing this component
    // <x-admin.sort-icon order="asc" orderBy="title" />

    public $order;
    public $orderBy;
    /**
     * Create a new component instance.
     */
    public function __construct($order, $orderBy)
    {
        $this->order = $order;
        $this->orderBy = $orderBy;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.sort-icon');
    }
}
