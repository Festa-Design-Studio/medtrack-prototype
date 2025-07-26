<div>
    {{-- Skip Navigation Link --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-sm focus:left-sm bg-primary-600 text-white px-md py-sm rounded-lg z-50">
        Skip to main content
    </a>

    <div id="main-content" class="max-w-4xl mx-auto py-3xl px-md sm:px-lg lg:px-xl">
        <!-- Header -->
        <div class="mb-2xl">
            <h1 class="text-3xl font-bold text-neutral-900 mb-md">Your Medications</h1>
            <p class="text-lg text-neutral-600">Manage your daily medications safely and easily</p>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="mb-xl p-lg bg-success-50 border border-success-200 rounded-lg" role="alert">
                <div class="flex items-center">
                    <x-components.atoms.health-icon type="medication" size="md" color="success" />
                    <span class="ml-md text-success-800 font-medium">{{ session('message') }}</span>
                </div>
            </div>
        @endif

        <!-- Add Medication Button -->
        @if (!$showForm)
            <div class="mb-2xl">
                <x-components.trauma-informed.gentle-button 
                    text="Add New Medication"
                    action="primary"
                    size="lg"
                    wire:click="showAddForm"
                    aria-label="Add a new medication">
                    <x-components.atoms.health-icon type="medication" size="md" color="primary" class="mr-md" />
                    Add New Medication
                </x-components.trauma-informed.gentle-button>
            </div>
        @endif

        <!-- Medication Form -->
        @if ($showForm)
            <div class="card mb-2xl">
                <div class="p-xl border-b border-neutral-200">
                    <h2 class="text-xl font-semibold text-neutral-900">
                        {{ $editingId ? 'Update Medication' : 'Add New Medication' }}
                    </h2>
                </div>

                <form wire:submit="saveMedication" class="p-xl space-y-xl">
                    <!-- Medication Name -->
                    <div>
                        <label for="name" class="block text-lg font-medium text-neutral-900 mb-md">
                            Medication Name <span class="text-error-600">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            wire:model="name" 
                            class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                            placeholder="e.g., Lisinopril, Metformin"
                            aria-describedby="name-help"
                            aria-required="true"
                        >
                        <p id="name-help" class="text-sm text-neutral-600 mt-sm">Enter the exact name as shown on your prescription bottle</p>
                        @error('name') 
                            <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Dosage -->
                    <div>
                        <label for="dosage" class="block text-lg font-medium text-neutral-900 mb-md">
                            Dosage <span class="text-error-600">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="dosage" 
                            wire:model="dosage" 
                            class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                            placeholder="e.g., 10mg, 1 tablet, 2 capsules"
                            aria-describedby="dosage-help"
                            aria-required="true"
                        >
                        <p id="dosage-help" class="text-sm text-neutral-600 mt-sm">How much do you take each time?</p>
                        @error('dosage') 
                            <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Schedule Time -->
                    <div>
                        <label for="schedule_time" class="block text-lg font-medium text-neutral-900 mb-md">
                            When do you take this? <span class="text-error-600">*</span>
                        </label>
                        <select 
                            id="schedule_time" 
                            wire:model="schedule_time" 
                            class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                            aria-describedby="schedule-help"
                            aria-required="true"
                        >
                            <option value="Morning">Morning (6 AM - 12 PM)</option>
                            <option value="Afternoon">Afternoon (12 PM - 6 PM)</option>
                            <option value="Evening">Evening (6 PM - 12 AM)</option>
                        </select>
                        <p id="schedule-help" class="text-sm text-neutral-600 mt-sm">Choose the time of day that works best for you</p>
                        @error('schedule_time') 
                            <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Frequency -->
                    <div>
                        <label for="frequency" class="block text-lg font-medium text-neutral-900 mb-md">
                            How often? <span class="text-error-600">*</span>
                        </label>
                        <select 
                            id="frequency" 
                            wire:model="frequency" 
                            class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                            aria-describedby="frequency-help"
                            aria-required="true"
                        >
                            <option value="Daily">Every day</option>
                            <option value="Weekly">Once a week</option>
                            <option value="As Needed">Only when needed</option>
                        </select>
                        <p id="frequency-help" class="text-sm text-neutral-600 mt-sm">How often should you take this medication?</p>
                        @error('frequency') 
                            <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-lg font-medium text-neutral-900 mb-md">
                            Special Instructions (Optional)
                        </label>
                        <textarea 
                            id="notes" 
                            wire:model="notes" 
                            rows="3" 
                            class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                            placeholder="e.g., Take with food, Before bedtime, With water"
                            aria-describedby="notes-help"
                        ></textarea>
                        <p id="notes-help" class="text-sm text-neutral-600 mt-sm">Any special instructions from your doctor or pharmacist</p>
                        @error('notes') 
                            <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex gap-lg pt-xl">
                        <x-components.trauma-informed.gentle-button 
                            text="{{ $editingId ? 'Update Medication' : 'Save Medication' }}"
                            action="primary"
                            size="lg"
                            type="submit">
                            <x-components.atoms.health-icon type="medication" size="sm" color="primary" class="mr-md" />
                            {{ $editingId ? 'Update Medication' : 'Save Medication' }}
                        </x-components.trauma-informed.gentle-button>
                        
                        <x-components.trauma-informed.gentle-button 
                            text="Cancel"
                            action="secondary"
                            size="lg"
                            type="button"
                            wire:click="hideForm">
                            Cancel
                        </x-components.trauma-informed.gentle-button>
                    </div>
                </form>
            </div>
        @endif

        <!-- Medications List -->
        <div class="space-y-xl">
            <div class="mb-xl">
                <h2 class="text-2xl font-semibold text-neutral-900 mb-md">Your Current Medications</h2>
                <p class="text-lg text-neutral-600">Manage and track your daily medications</p>
            </div>
            
            @if($medications->count() > 0)
                <div class="grid gap-xl">
                    @foreach($medications as $medication)
                        <div class="medication-card-wrapper">
                            <x-components.molecules.medication-card
                                :name="$medication->name"
                                :dosage="$medication->dosage"
                                :schedule="$medication->schedule_time"
                                :frequency="$medication->frequency"
                                :cost="0"
                                :nextDose="null"
                                :adherence="null"
                                :notes="$medication->notes" />
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card text-center py-3xl px-xl">
                    <x-components.atoms.health-icon type="medication" size="xl" color="neutral" class="mx-auto mb-xl" />
                    <h3 class="text-xl font-semibold text-neutral-900 mb-md">No medications added yet</h3>
                    <p class="text-neutral-600 mb-xl text-lg">Get started by adding your first medication</p>
                    <x-components.trauma-informed.gentle-button 
                        text="Add Your First Medication"
                        action="primary"
                        size="lg"
                        wire:click="showAddForm">
                        Add Your First Medication
                    </x-components.trauma-informed.gentle-button>
                </div>
            @endif
        </div>

        <!-- Navigation -->
        <div class="mt-3xl pt-xl border-t border-neutral-200">
            <div class="flex justify-between items-center">
                <x-components.trauma-informed.gentle-button 
                    text="Back to Dashboard"
                    action="secondary"
                    size="md"
                    href="{{ route('dashboard') }}">
                    <x-components.atoms.health-icon type="appointment" size="sm" color="neutral" class="mr-md" />
                    Back to Dashboard
                </x-components.trauma-informed.gentle-button>
                
                <x-components.trauma-informed.gentle-button 
                    text="Log Vitals"
                    action="primary"
                    size="md"
                    href="{{ route('vitals') }}">
                    Log Vitals
                    <x-components.atoms.health-icon type="vitals" size="sm" color="primary" class="ml-md" />
                </x-components.trauma-informed.gentle-button>
            </div>
        </div>
    </div>
</div>
