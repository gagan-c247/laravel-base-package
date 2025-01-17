<?php

namespace C247\Codebank\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormModal extends Component
{
    public $title;
    public $formAction;
    public $method;
    public $category;
    public $categories;

    public function __construct($title, $formAction, $method = 'POST', $category = null, $categories = [])
    {
        $this->title = $title;
        $this->formAction = $formAction;
        $this->method = strtoupper($method);
        $this->category = $category;
        $this->categories = $categories;
    }

    public function render()
    {
        return view('admin.components.form-modal');
    }
}
