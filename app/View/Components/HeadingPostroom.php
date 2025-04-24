<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeadingPostroom extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $order;
    public function __construct($title, $order)
    {
        $this->title = $title;
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.heading-postroom');
    }
}
