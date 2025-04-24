<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RangeDatePickerPostRoom extends Component
{
    /**
     * Create a new component instance.
     */
    public $startName;
    public $endName;

    public function __construct($startName, $endName)
    {
        $this->startName = $startName;
        $this->endName = $endName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.range-date-picker-post-room');
    }
}
