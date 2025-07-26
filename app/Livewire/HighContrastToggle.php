<?php

namespace App\Livewire;

use Livewire\Component;

class HighContrastToggle extends Component
{
    public $highContrast = false;
    
    public function mount()
    {
        // Get preference from session
        $this->highContrast = session('high_contrast_mode', false);
    }
    
    public function toggleHighContrast()
    {
        $this->highContrast = !$this->highContrast;
        
        // Save to session
        session(['high_contrast_mode' => $this->highContrast]);
        
        // Log for debugging
        logger('High contrast toggled: ' . ($this->highContrast ? 'ON' : 'OFF'));
    }
    
    public function render()
    {
        return view('livewire.high-contrast-toggle');
    }
} 