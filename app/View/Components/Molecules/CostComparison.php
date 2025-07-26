<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class CostComparison extends Component
{
    public $currentCost;
    public $alternativeCost;
    public $savings;
    public $pharmacy;

    /**
     * Create a new component instance.
     */
    public function __construct($currentCost = 0, $alternativeCost = 0, $savings = 0, $pharmacy = 'Current Pharmacy')
    {
        $this->currentCost = $currentCost;
        $this->alternativeCost = $alternativeCost;
        $this->savings = $savings;
        $this->pharmacy = $pharmacy;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.molecules.cost-comparison');
    }
}
