<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Medication;

class MedicationCardWithCost extends Component
{
    // Public properties for medication data
    public $medication;
    public $medicationId;
    public $name;
    public $dosage;
    public $scheduleTime;
    public $notes;
    public $takenToday = false;
    public $nextDose;
    
    // Cost transparency properties (addresses #1 RFI complaint)
    public $monthlyCost = 0;
    public $insuranceCovered = false;
    public $copayAmount = 0;
    public $pharmacyName = '';
    public $alternativePharmacyCost = 0;
    public $potentialSavings = 0;
    public $costTrend = 'stable'; // 'increasing', 'decreasing', 'stable'
    public $lastCostUpdate;
    
    // Adherence tracking
    public $adherenceRate = 0;
    public $missedDoses = 0;
    public $adherenceGoal = 90;

    public function mount($medication = null, $medicationId = null)
    {
        if ($medication) {
            $this->medication = $medication;
            $this->medicationId = $medication->id;
        } elseif ($medicationId) {
            $this->medication = Medication::find($medicationId);
            $this->medicationId = $medicationId;
        }

        if ($this->medication) {
            $this->loadMedicationData();
            $this->calculateCostData();
            $this->calculateAdherence();
        }
    }

    private function loadMedicationData()
    {
        $this->name = $this->medication->name;
        $this->dosage = $this->medication->dosage;
        $this->scheduleTime = $this->medication->schedule_time;
        $this->notes = $this->medication->notes;
        
        // Calculate next dose time
        $this->nextDose = $this->calculateNextDose();
        
        // Check if taken today (mock implementation)
        $this->takenToday = $this->checkTakenToday();
    }

    private function calculateCostData()
    {
        // Mock cost data - in production, integrate with pharmacy APIs and insurance
        // Based on RFI demand for "upfront cost disclosure"
        
        $this->monthlyCost = rand(15, 150); // Random for demo
        $this->insuranceCovered = rand(0, 1) === 1;
        $this->copayAmount = $this->insuranceCovered ? ($this->monthlyCost * 0.2) : $this->monthlyCost;
        $this->pharmacyName = collect(['CVS', 'Walgreens', 'Rite Aid', 'Local Pharmacy'])->random();
        
        // Calculate alternative costs for comparison
        $this->alternativePharmacyCost = $this->monthlyCost + rand(-15, 25);
        $this->potentialSavings = max(0, $this->monthlyCost - $this->alternativePharmacyCost);
        
        // Cost trend analysis
        $trends = ['stable', 'increasing', 'decreasing'];
        $this->costTrend = $trends[array_rand($trends)];
        $this->lastCostUpdate = now()->subDays(rand(1, 30))->format('M j');
    }

    private function calculateAdherence()
    {
        // Calculate adherence rate (addresses interoperability pain point)
        $this->adherenceRate = rand(70, 98); // Mock data
        $this->missedDoses = rand(0, 5);
    }

    private function calculateNextDose()
    {
        if (!$this->scheduleTime) return null;
        
        $nextDose = now()->setTimeFromTimeString($this->scheduleTime);
        if ($nextDose->isPast()) {
            $nextDose->addDay();
        }
        return $nextDose;
    }

    private function checkTakenToday()
    {
        // Mock implementation - in production, check actual logs
        return rand(0, 1) === 1;
    }

    public function markAsTaken()
    {
        $this->takenToday = true;
        $this->dispatch('medication-taken', [
            'medication_id' => $this->medicationId,
            'taken_at' => now()
        ]);
        
        // Update adherence
        $this->adherenceRate = min(100, $this->adherenceRate + 1);
        
        session()->flash('medication-taken', "✅ {$this->name} marked as taken");
    }

    public function markAsMissed()
    {
        $this->takenToday = false;
        $this->missedDoses++;
        $this->adherenceRate = max(0, $this->adherenceRate - 2);
        
        session()->flash('medication-missed', "⚠️ {$this->name} marked as missed");
    }

    public function comparePrices()
    {
        // Navigate to cost comparison page (addresses market competition pain point)
        $this->dispatch('show-price-comparison', [
            'medication_id' => $this->medicationId,
            'current_cost' => $this->monthlyCost
        ]);
    }

    public function setReminder()
    {
        $this->dispatch('set-medication-reminder', [
            'medication_id' => $this->medicationId,
            'time' => $this->scheduleTime
        ]);
        
        session()->flash('reminder-set', "🔔 Reminder set for {$this->name}");
    }

    public function viewCostHistory()
    {
        // Show cost trends over time (price transparency)
        $this->dispatch('show-cost-history', [
            'medication_id' => $this->medicationId
        ]);
    }

    public function render()
    {
        return view('livewire.medication-card-with-cost');
    }
}
