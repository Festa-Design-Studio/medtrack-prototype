<div class="max-w-4xl mx-auto py-3xl px-md sm:px-lg lg:px-xl">
    <!-- Header -->
    <div class="mb-2xl">
        <h1 class="text-3xl font-bold text-neutral-900 mb-md">Log Your Vital Signs</h1>
        <p class="text-lg text-neutral-600">Track your health measurements to share with your doctor</p>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="mb-xl p-lg bg-success-50 border border-success-200 rounded-lg" role="alert">
            <div class="flex items-center">
                <x-components.atoms.health-icon type="vitals" size="md" color="success" />
                <span class="ml-md text-success-800 font-medium">{{ session('message') }}</span>
            </div>
        </div>
    @endif

    <!-- Error Message -->
    @if (session()->has('error'))
        <div class="mb-xl p-lg bg-error-50 border border-error-200 rounded-lg" role="alert">
            <div class="flex items-center">
                <x-components.atoms.health-icon type="emergency" size="md" color="error" />
                <span class="ml-md text-error-800 font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Add Vital Button -->
    @if (!$showForm)
        <div class="mb-2xl">
            <x-components.trauma-informed.gentle-button 
                text="Log New Reading"
                action="primary"
                size="lg"
                wire:click="showAddForm"
                aria-label="Log new vital signs">
                <x-components.atoms.health-icon type="vitals" size="md" color="primary" class="mr-md" />
                Log New Reading
            </x-components.trauma-informed.gentle-button>
        </div>
    @endif

    <!-- Vitals Form -->
    @if ($showForm)
        <div class="card mb-2xl">
            <div class="p-xl border-b border-neutral-200">
                <h2 class="text-xl font-semibold text-neutral-900 mb-sm">
                    {{ $editingId ? 'Update Vital Signs' : 'Log New Vital Signs' }}
                </h2>
                <p class="text-neutral-600">Enter any measurements you have. You don't need to fill out everything.</p>
            </div>

            <form wire:submit="saveVital" class="p-xl space-y-xl">
                <!-- When Recorded -->
                <div>
                    <label for="recorded_at" class="block text-lg font-medium text-neutral-900 mb-md">
                        When was this recorded? <span class="text-error-600">*</span>
                    </label>
                    <input 
                        type="datetime-local" 
                        id="recorded_at" 
                        wire:model="recorded_at" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        aria-describedby="recorded-help"
                        aria-required="true"
                    >
                    <p id="recorded-help" class="text-sm text-neutral-600 mt-sm">Select the date and time when you took these measurements</p>
                    @error('recorded_at') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Blood Pressure -->
                <div>
                    <label for="blood_pressure" class="block text-lg font-medium text-neutral-900 mb-md">
                        Blood Pressure
                    </label>
                    <input 
                        type="text" 
                        id="blood_pressure" 
                        wire:model="blood_pressure" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        placeholder="120/80"
                        aria-describedby="bp-help"
                        pattern="\d{2,3}/\d{2,3}"
                    >
                    <p id="bp-help" class="text-sm text-neutral-600 mt-sm">Enter as two numbers separated by a slash (e.g., 120/80)</p>
                    @error('blood_pressure') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Blood Sugar -->
                <div>
                    <label for="blood_sugar" class="block text-lg font-medium text-neutral-900 mb-md">
                        Blood Sugar (mg/dL)
                    </label>
                    <input 
                        type="number" 
                        id="blood_sugar" 
                        wire:model="blood_sugar" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        placeholder="100"
                        aria-describedby="sugar-help"
                        min="50"
                        max="600"
                    >
                    <p id="sugar-help" class="text-sm text-neutral-600 mt-sm">Normal range is usually 80-130 before meals</p>
                    @error('blood_sugar') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Weight -->
                <div>
                    <label for="weight" class="block text-lg font-medium text-neutral-900 mb-md">
                        Weight (pounds)
                    </label>
                    <input 
                        type="number" 
                        id="weight" 
                        wire:model="weight" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        placeholder="150"
                        aria-describedby="weight-help"
                        step="0.1"
                        min="50"
                        max="1000"
                    >
                    <p id="weight-help" class="text-sm text-neutral-600 mt-sm">Enter your weight in pounds (e.g., 150.5)</p>
                    @error('weight') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Mood -->
                <div>
                    <label for="mood" class="block text-lg font-medium text-neutral-900 mb-md">
                        How are you feeling today?
                    </label>
                    <select 
                        id="mood" 
                        wire:model="mood" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        aria-describedby="mood-help"
                    >
                        <option value="">Choose how you feel (optional)</option>
                        <option value="😊 Great">😊 Great</option>
                        <option value="🙂 Good">🙂 Good</option>
                        <option value="😐 Okay">😐 Okay</option>
                        <option value="😔 Not great">😔 Not great</option>
                        <option value="😞 Poor">😞 Poor</option>
                        <option value="😴 Tired">😴 Tired</option>
                        <option value="😰 Anxious">😰 Anxious</option>
                        <option value="😷 Unwell">😷 Unwell</option>
                    </select>
                    <p id="mood-help" class="text-sm text-neutral-600 mt-sm">How you're feeling can be important for your health</p>
                    @error('mood') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="note" class="block text-lg font-medium text-neutral-900 mb-md">
                        Additional Notes (Optional)
                    </label>
                    <textarea 
                        id="note" 
                        wire:model="note" 
                        rows="3" 
                        class="w-full min-h-touch px-lg py-lg border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg"
                        placeholder="e.g., Feeling dizzy, took extra medication, had a good walk today"
                        aria-describedby="note-help"
                    ></textarea>
                    <p id="note-help" class="text-sm text-neutral-600 mt-sm">Anything else you'd like to remember about today?</p>
                    @error('note') 
                        <p class="text-error-600 text-base mt-md" role="alert">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-lg pt-xl">
                    <x-components.trauma-informed.gentle-button 
                        text="{{ $editingId ? 'Update Reading' : 'Save Reading' }}"
                        action="success"
                        size="lg"
                        type="submit">
                        <x-components.atoms.health-icon type="vitals" size="sm" color="success" class="mr-md" />
                        {{ $editingId ? 'Update Reading' : 'Save Reading' }}
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

    <!-- Vitals History -->
    <div class="space-y-xl">
        <div class="mb-xl">
            <h2 class="text-2xl font-semibold text-neutral-900 mb-md">Your Recent Readings</h2>
            <p class="text-lg text-neutral-600">Track your health measurements over time</p>
        </div>
        
        @if($vitals->count() > 0)
            <div class="space-y-xl">
                @foreach($vitals as $vital)
                    <div class="card p-xl">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-lg">
                                    <h3 class="text-lg font-semibold text-neutral-900">
                                        {{ $vital->recorded_at->format('M j, Y \a\t g:i A') }}
                                    </h3>
                                    <span class="text-sm text-neutral-600">
                                        {{ $vital->recorded_at->diffForHumans() }}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-lg">
                                    @if($vital->blood_pressure)
                                        <div class="bg-neutral-50 p-lg rounded-lg border border-neutral-200">
                                            <p class="text-sm text-neutral-600 mb-sm">Blood Pressure</p>
                                            <p class="text-lg font-semibold text-neutral-900">{{ $vital->blood_pressure }}</p>
                                        </div>
                                    @endif
                                    
                                    @if($vital->blood_sugar)
                                        <div class="bg-neutral-50 p-lg rounded-lg border border-neutral-200">
                                            <p class="text-sm text-neutral-600 mb-sm">Blood Sugar</p>
                                            <p class="text-lg font-semibold text-neutral-900">{{ $vital->blood_sugar }} mg/dL</p>
                                        </div>
                                    @endif
                                    
                                    @if($vital->weight)
                                        <div class="bg-neutral-50 p-lg rounded-lg border border-neutral-200">
                                            <p class="text-sm text-neutral-600 mb-sm">Weight</p>
                                            <p class="text-lg font-semibold text-neutral-900">{{ $vital->weight }} lbs</p>
                                        </div>
                                    @endif
                                    
                                    @if($vital->mood)
                                        <div class="bg-neutral-50 p-lg rounded-lg border border-neutral-200">
                                            <p class="text-sm text-neutral-600 mb-sm">Mood</p>
                                            <p class="text-lg font-semibold text-neutral-900">{{ $vital->mood }}</p>
                                        </div>
                                    @endif
                                </div>
                                
                                @if($vital->note)
                                    <div class="mt-lg p-lg bg-primary-50 rounded-lg border border-primary-200">
                                        <p class="text-sm text-neutral-600 mb-sm">Notes:</p>
                                        <p class="text-base text-neutral-900">{{ $vital->note }}</p>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex gap-md ml-xl">
                                <button 
                                    wire:click="editVital({{ $vital->id }})" 
                                    class="min-h-touch min-w-touch px-md py-sm bg-neutral-100 hover:bg-neutral-200 text-neutral-700 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 transition-colors"
                                    aria-label="Edit reading from {{ $vital->recorded_at->format('M j') }}"
                                >
                                    <x-components.atoms.health-icon type="provider" size="sm" color="neutral" />
                                    <span class="sr-only">Edit</span>
                                </button>
                                <button 
                                    wire:click="deleteVital({{ $vital->id }})" 
                                    wire:confirm="Are you sure you want to remove this reading? This action cannot be undone."
                                    class="min-h-touch min-w-touch px-md py-sm bg-error-100 hover:bg-error-200 text-error-700 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-error-500 focus:ring-offset-2 transition-colors"
                                    aria-label="Remove reading from {{ $vital->recorded_at->format('M j') }}"
                                >
                                    <x-components.atoms.health-icon type="emergency" size="sm" color="error" />
                                    <span class="sr-only">Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-xl">
                {{ $vitals->links() }}
            </div>
        @else
            <div class="card text-center py-3xl px-xl">
                <x-components.atoms.health-icon type="vitals" size="xl" color="neutral" class="mx-auto mb-xl" />
                <h3 class="text-xl font-semibold text-neutral-900 mb-md">No readings recorded yet</h3>
                <p class="text-neutral-600 mb-xl text-lg">Start tracking your vital signs to share with your healthcare team</p>
                <x-components.trauma-informed.gentle-button 
                    text="Log Your First Reading"
                    action="primary"
                    size="lg"
                    wire:click="showAddForm">
                    Log Your First Reading
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
                text="Manage Medications"
                action="primary"
                size="md"
                href="{{ route('medications') }}">
                Manage Medications
                <x-components.atoms.health-icon type="medication" size="sm" color="primary" class="ml-md" />
            </x-components.trauma-informed.gentle-button>
        </div>
    </div>
</div>
