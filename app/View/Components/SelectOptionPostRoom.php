<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectOptionPostRoom extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $name;
    public $id;
    public $options;
    public $selected;

    public function __construct($label, $name, $id, $options = [], $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-option-post-room');
    }
}
