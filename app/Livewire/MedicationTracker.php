<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Medication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class MedicationTracker extends Component
{
    // Form properties with validation
    #[Validate('required|string|max:255')]
    public $name = '';
    
    #[Validate('required|string|max:255')]
    public $dosage = '';
    
    #[Validate('required|in:Morning,Afternoon,Evening')]
    public $schedule_time = 'Morning';
    
    #[Validate('required|in:Daily,Weekly,As Needed')]
    public $frequency = 'Daily';
    
    #[Validate('nullable|string|max:500')]
    public $notes = '';
    
    // Component state
    public $editingId = null;
    public $showForm = false;
    
    protected $messages = [
        'name.required' => 'Please enter the medication name.',
        'dosage.required' => 'Please enter the dosage amount.',
        'schedule_time.required' => 'Please select when to take this medication.',
        'frequency.required' => 'Please select how often to take this medication.',
    ];

    public function mount()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }

    public function showAddForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function hideForm()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function saveMedication()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->name,
            'dosage' => $this->dosage,
            'schedule_time' => $this->schedule_time,
            'frequency' => $this->frequency,
            'notes' => $this->notes,
        ];

        if ($this->editingId) {
            // Update existing medication
            $medication = Medication::where('id', $this->editingId)
                ->where('user_id', Auth::id())
                ->firstOrFail();
            $medication->update($data);
            
            session()->flash('message', 'Medication updated successfully!');
        } else {
            // Create new medication
            Medication::create($data);
            session()->flash('message', 'Medication added successfully!');
        }

        $this->resetForm();
        $this->showForm = false;
    }

    public function editMedication($id)
    {
        $medication = Medication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->editingId = $id;
        $this->name = $medication->name;
        $this->dosage = $medication->dosage;
        $this->schedule_time = $medication->schedule_time;
        $this->frequency = $medication->frequency;
        $this->notes = $medication->notes ?? '';
        $this->showForm = true;
    }

    public function deleteMedication($id)
    {
        $medication = Medication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        $medication->delete();
        session()->flash('message', 'Medication removed successfully.');
    }

    private function resetForm()
    {
        $this->editingId = null;
        $this->name = '';
        $this->dosage = '';
        $this->schedule_time = 'Morning';
        $this->frequency = 'Daily';
        $this->notes = '';
        $this->resetValidation();
    }

    public function render()
    {
        $medications = Auth::user()->medications()->orderBy('schedule_time')->orderBy('name')->get();
        
        return view('livewire.medication-tracker', [
            'medications' => $medications
        ]);
    }
}
