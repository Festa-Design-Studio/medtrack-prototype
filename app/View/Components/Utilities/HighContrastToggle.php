<?php

namespace App\View\Components\Utilities;

use Illuminate\View\Component;

class HighContrastToggle extends Component
{
    public $currentMode;

    /**
     * Create a new component instance.
     */
    public function __construct($currentMode = false)
    {
        $this->currentMode = $currentMode;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.utilities.high-contrast-toggle');
    }
}
