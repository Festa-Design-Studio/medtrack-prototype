<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vital;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class VitalsLogger extends Component
{
    // Form properties with validation
    #[Validate('nullable|regex:/^\d{2,3}\/\d{2,3}$/')]
    public $blood_pressure = '';
    
    #[Validate('nullable|integer|min:50|max:600')]
    public $blood_sugar = '';
    
    #[Validate('nullable|numeric|min:50|max:1000')]
    public $weight = '';
    
    #[Validate('nullable|string|max:100')]
    public $mood = '';
    
    #[Validate('nullable|string|max:500')]
    public $note = '';
    
    #[Validate('required|date')]
    public $recorded_at = '';
    
    // Component state
    public $editingId = null;
    public $showForm = false;
    
    protected $messages = [
        'blood_pressure.regex' => 'Please enter blood pressure in format: 120/80',
        'blood_sugar.integer' => 'Blood sugar must be a whole number',
        'blood_sugar.min' => 'Blood sugar seems too low (minimum 50)',
        'blood_sugar.max' => 'Blood sugar seems too high (maximum 600)',
        'weight.numeric' => 'Weight must be a number',
        'weight.min' => 'Weight seems too low (minimum 50 lbs)',
        'weight.max' => 'Weight seems too high (maximum 1000 lbs)',
        'recorded_at.required' => 'Please select when this was recorded',
    ];

    public function mount()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Default to current date and time
        $this->recorded_at = now()->format('Y-m-d\TH:i');
    }

    public function showAddForm()
    {
        $this->resetForm();
        $this->recorded_at = now()->format('Y-m-d\TH:i');
        $this->showForm = true;
    }

    public function hideForm()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function saveVital()
    {
        $this->validate();
        
        // At least one vital must be entered
        if (empty($this->blood_pressure) && empty($this->blood_sugar) && 
            empty($this->weight) && empty($this->mood)) {
            session()->flash('error', 'Please enter at least one vital sign measurement.');
            return;
        }

        $data = [
            'user_id' => Auth::id(),
            'blood_pressure' => $this->blood_pressure ?: null,
            'blood_sugar' => $this->blood_sugar ?: null,
            'weight' => $this->weight ?: null,
            'mood' => $this->mood ?: null,
            'note' => $this->note ?: null,
            'recorded_at' => Carbon::parse($this->recorded_at),
        ];

        if ($this->editingId) {
            // Update existing vital
            $vital = Vital::where('id', $this->editingId)
                ->where('user_id', Auth::id())
                ->firstOrFail();
            $vital->update($data);
            
            session()->flash('message', 'Vital signs updated successfully!');
        } else {
            // Create new vital
            Vital::create($data);
            session()->flash('message', 'Vital signs logged successfully!');
        }

        $this->resetForm();
        $this->showForm = false;
    }

    public function editVital($id)
    {
        $vital = Vital::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->editingId = $id;
        $this->blood_pressure = $vital->blood_pressure ?? '';
        $this->blood_sugar = $vital->blood_sugar ?? '';
        $this->weight = $vital->weight ?? '';
        $this->mood = $vital->mood ?? '';
        $this->note = $vital->note ?? '';
        $this->recorded_at = $vital->recorded_at->format('Y-m-d\TH:i');
        $this->showForm = true;
    }

    public function deleteVital($id)
    {
        $vital = Vital::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        $vital->delete();
        session()->flash('message', 'Vital signs entry removed successfully.');
    }

    private function resetForm()
    {
        $this->editingId = null;
        $this->blood_pressure = '';
        $this->blood_sugar = '';
        $this->weight = '';
        $this->mood = '';
        $this->note = '';
        $this->recorded_at = now()->format('Y-m-d\TH:i');
        $this->resetValidation();
    }

    public function render()
    {
        $vitals = Auth::user()->vitals()
            ->orderBy('recorded_at', 'desc')
            ->paginate(10);
            
        return view('livewire.vitals-logger', [
            'vitals' => $vitals
        ]);
    }
}
