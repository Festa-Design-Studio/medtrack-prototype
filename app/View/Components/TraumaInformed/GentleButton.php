<?php

namespace App\View\Components\TraumaInformed;

use Illuminate\View\Component;

class GentleButton extends Component
{
    public $text;
    public $action;
    public $size;

    /**
     * Create a new component instance.
     */
    public function __construct($text = 'Continue', $action = 'primary', $size = 'md')
    {
        $this->text = $text;
        $this->action = $action;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.trauma-informed.gentle-button');
    }
}
