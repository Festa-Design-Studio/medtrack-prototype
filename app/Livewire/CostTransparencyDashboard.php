<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Medication;
use App\Models\Vital;
use App\Models\Appointment;

class CostTransparencyDashboard extends Component
{
    // Public properties for cost data
    public $totalYearlySpending = 0;
    public $monthlySpending = 0;
    public $medicationCosts = 0;
    public $doctorVisitCosts = 0;
    public $testsCosts = 0;
    public $upcomingCosts = [];
    public $costBreakdown = [];
    public $savingsOpportunities = [];

    public function mount()
    {
        $this->calculateCostData();
        $this->identifySavingsOpportunities();
    }

    private function calculateCostData()
    {
        $user = Auth::user();
        
        // Mock data based on RFI analysis - in production, integrate with insurance APIs
        $this->totalYearlySpending = 2847;
        $this->monthlySpending = 453;
        
        // Medication costs (most transparent in RFI feedback)
        $medications = Medication::where('user_id', $user->id)->get();
        $this->medicationCosts = $medications->count() * 32; // Average per medication
        
        // Doctor visit costs
        $appointments = Appointment::where('user_id', $user->id)
            ->where('appointment_at', '>=', now()->subMonths(3))
            ->count();
        $this->doctorVisitCosts = $appointments * 150;
        
        // Tests and procedures
        $this->testsCosts = 431; // Based on average from RFI data
        
        // Upcoming costs - addresses "know costs before care" demand
        $this->upcomingCosts = [
            [
                'service' => 'Annual Physical - Dr. Johnson',
                'date' => 'March 15, 2025',
                'estimated_cost' => 150,
                'insurance_covered' => 120,
                'patient_cost' => 30,
                'confidence' => 'High'
            ],
            [
                'service' => 'Blood Work - Lab Tests',
                'date' => 'February 28, 2025', 
                'estimated_cost' => 250,
                'insurance_covered' => 200,
                'patient_cost' => 50,
                'confidence' => 'Medium'
            ]
        ];
        
        // Cost breakdown for transparency
        $this->costBreakdown = [
            'medications' => $this->medicationCosts,
            'doctor_visits' => $this->doctorVisitCosts,
            'tests_procedures' => $this->testsCosts,
            'other' => $this->totalYearlySpending - ($this->medicationCosts + $this->doctorVisitCosts + $this->testsCosts)
        ];
    }

    private function identifySavingsOpportunities()
    {
        // Based on RFI feedback about wanting to "shop around"
        $this->savingsOpportunities = [
            [
                'type' => 'pharmacy_switch',
                'description' => 'Switch to CVS Pharmacy for Metformin',
                'potential_savings' => 12.50,
                'frequency' => 'monthly',
                'action_required' => 'Change pharmacy preference'
            ],
            [
                'type' => 'generic_substitute',
                'description' => 'Ask doctor about generic alternative for Lipitor',
                'potential_savings' => 45.00,
                'frequency' => 'monthly',
                'action_required' => 'Discuss with provider'
            ],
            [
                'type' => 'preventive_care',
                'description' => 'Annual physical prevents emergency visits',
                'potential_savings' => 500.00,
                'frequency' => 'yearly',
                'action_required' => 'Schedule appointment'
            ]
        ];
    }

    public function explorePharmacySavings($medicationId = null)
    {
        // Navigate to cost comparison for specific medication
        $this->dispatch('show-pharmacy-comparison', ['medication' => $medicationId]);
    }

    public function schedulePreventiveCare($serviceType)
    {
        // Navigate to appointment scheduling with cost estimate
        $this->dispatch('schedule-appointment', ['service' => $serviceType, 'show_cost' => true]);
    }

    public function exportCostData($format = 'pdf')
    {
        // Export cost data for insurance or tax purposes
        // Addresses RFI demand for "machine-readable access"
        $this->dispatch('export-cost-data', ['format' => $format]);
    }

    public function render()
    {
        return view('livewire.cost-transparency-dashboard');
    }
}
