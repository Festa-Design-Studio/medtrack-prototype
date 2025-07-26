<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class CostIndicator extends Component
{
    public $amount;
    public $period;
    public $variant;

    /**
     * Create a new component instance.
     */
    public function __construct($amount = '$0.00', $period = 'month', $variant = 'default')
    {
        $this->amount = $amount;
        $this->period = $period;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.atoms.cost-indicator');
    }
}
