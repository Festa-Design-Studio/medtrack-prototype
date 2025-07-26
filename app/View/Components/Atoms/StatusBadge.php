<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class StatusBadge extends Component
{
    public $status;
    public $text;
    public $icon;

    /**
     * Create a new component instance.
     */
    public function __construct($status = 'active', $text = 'Status', $icon = null)
    {
        $this->status = $status;
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.atoms.status-badge');
    }
}
