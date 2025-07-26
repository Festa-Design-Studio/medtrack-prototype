<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class MedicationCard extends Component
{
    public $name;
    public $dosage;
    public $schedule;
    public $frequency;
    public $cost;
    public $nextDose;
    public $adherence;
    public $notes;

    /**
     * Create a new component instance.
     */
    public function __construct($name = 'Medication Name', $dosage = 'Dosage', $schedule = 'Morning', $frequency = 'Daily', $cost = 0, $nextDose = null, $adherence = null, $notes = '')
    {
        $this->name = $name;
        $this->dosage = $dosage;
        $this->schedule = $schedule;
        $this->frequency = $frequency;
        $this->cost = $cost;
        $this->nextDose = $nextDose;
        $this->adherence = $adherence;
        $this->notes = $notes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.molecules.medication-card');
    }
}
