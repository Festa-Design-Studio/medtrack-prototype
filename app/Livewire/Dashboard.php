<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Medication;
use App\Models\Vital;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        
        if (!$user) {
            return view('livewire.dashboard', [
                'medications' => collect(),
                'recentVitals' => collect(),
                'upcomingAppointments' => collect(),
            ]);
        }

        // Get today's medications
        $medications = $user->medications()->get();
        
        // Get recent vitals (last 5 entries)
        $recentVitals = $user->vitals()
            ->orderBy('recorded_at', 'desc')
            ->limit(5)
            ->get();
            
        // Get upcoming appointments (next 3)
        $upcomingAppointments = $user->appointments()
            ->where('appointment_at', '>=', now())
            ->orderBy('appointment_at')
            ->limit(3)
            ->get();

        return view('livewire.dashboard', [
            'medications' => $medications,
            'recentVitals' => $recentVitals,
            'upcomingAppointments' => $upcomingAppointments,
        ]);
    }
}
