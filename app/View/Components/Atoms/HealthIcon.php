<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class HealthIcon extends Component
{
    public $type;
    public $size;
    public $color;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'medication', $size = 'md', $color = 'primary')
    {
        $this->type = $type;
        $this->size = $size;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.atoms.health-icon');
    }
}
