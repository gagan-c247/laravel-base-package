<?php

namespace C247\Codebank\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableSearch extends Component
{
    /**
     * Create a new component instance.
     */
    public $placeholder;
    public function __construct($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.table-search');
    }
}
