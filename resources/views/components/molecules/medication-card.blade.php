{{-- Medication Card Molecule Component --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

@props([
    'name' => 'Medication Name',
    'dosage' => 'Dosage',
    'schedule' => 'Morning',
    'frequency' => 'Daily',
    'cost' => 0,
    'nextDose' => null,
    'adherence' => null,
    'notes' => ''
])

@php
    // Calculate adherence color
    $adherenceColor = $adherence >= 90 ? 'success' : ($adherence >= 70 ? 'warning' : 'error');
    
    // Format next dose time - handle both string and Carbon objects
    $nextDoseFormatted = null;
    $isOverdue = false;
    
    if ($nextDose) {
        // If it's a string, try to parse it as a date
        if (is_string($nextDose)) {
            try {
                $nextDose = \Carbon\Carbon::parse($nextDose);
            } catch (\Exception $e) {
                // If parsing fails, treat as null
                $nextDose = null;
            }
        }
        
        // If we have a valid date object, format it
        if ($nextDose instanceof \Carbon\Carbon) {
            $nextDoseFormatted = $nextDose->format('g:i A');
            $isOverdue = $nextDose->isPast();
        }
    }
@endphp

<div class="card border-l-4 border-primary-500 {{ $isOverdue ? 'border-error-500 bg-error-50' : '' }}" 
     role="article" 
     aria-labelledby="med-title-{{ Str::slug($name) }}">
    
    <div class="p-xl">
        <div class="flex items-start justify-between">
            <div class="flex items-start space-x-xl">
                {{-- Medication Icon --}}
                <div class="flex-shrink-0" aria-hidden="true">
                    <x-components.atoms.health-icon type="medication" size="lg" color="primary" />
                </div>
                
                {{-- Medication Details --}}
                <div class="flex-1 min-w-0">
                    <h3 id="med-title-{{ Str::slug($name) }}" class="text-xl font-semibold text-neutral-900 mb-md">
                        {{ $name }}
                    </h3>
                    
                    <div class="space-y-md">
                        {{-- Dosage and Schedule --}}
                        <p class="text-base text-neutral-600">
                            <span class="font-medium">{{ $dosage }}</span> • 
                            <span class="font-medium">{{ $schedule }}</span> • 
                            <span class="font-medium">{{ $frequency }}</span>
                        </p>
                        
                        {{-- Next Dose --}}
                        @if($nextDoseFormatted)
                            <p class="text-base text-neutral-600">
                                <span class="font-medium">Next dose:</span> 
                                <span class="{{ $isOverdue ? 'text-error-600 font-semibold' : 'text-neutral-700' }}">
                                    {{ $nextDoseFormatted }}
                                    @if($isOverdue)
                                        <span class="text-error-600">(Overdue)</span>
                                    @endif
                                </span>
                            </p>
                        @endif
                        
                        {{-- Adherence Rate --}}
                        @if($adherence !== null)
                            <div class="flex items-center space-x-md">
                                <span class="text-base text-neutral-600">Adherence:</span>
                                <x-components.atoms.status-badge 
                                    status="{{ $adherenceColor }}" 
                                    text="{{ $adherence }}%" />
                            </div>
                        @endif
                        
                        {{-- Notes --}}
                        @if($notes)
                            <p class="text-sm text-neutral-500 italic">{{ $notes }}</p>
                        @endif
                    </div>
                </div>
            </div>
            
            {{-- Cost Information --}}
            <div class="flex flex-col items-end space-y-md">
                <x-components.atoms.cost-indicator 
                    amount="${{ number_format($cost, 2) }}" 
                    period="month" 
                    variant="default" />
                
                {{-- Action Buttons --}}
                <div class="flex space-x-md">
                    <button class="min-h-touch min-w-touch px-md py-sm bg-primary-500 hover:bg-primary-600 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors"
                            aria-label="Mark {{ $name }} as taken">
                        Taken
                    </button>
                    
                    <button class="min-h-touch min-w-touch px-md py-sm bg-neutral-100 hover:bg-neutral-200 text-neutral-700 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 transition-colors"
                            aria-label="Edit {{ $name }} medication">
                        Edit
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Cost Transparency Section --}}
        @if($cost > 0)
            <div class="mt-xl pt-xl border-t border-neutral-200">
                <div class="flex items-center justify-between mb-md">
                    <div>
                        <h4 class="text-base font-medium text-neutral-900">Cost Information</h4>
                        <p class="text-sm text-neutral-600">Monthly cost breakdown</p>
                    </div>
                    <x-components.atoms.health-icon type="cost" size="md" color="neutral" />
                </div>
                
                <div class="grid grid-cols-2 gap-xl">
                    <div>
                        <p class="text-sm text-neutral-600">Insurance Coverage</p>
                        <p class="text-base font-medium text-neutral-900">${{ number_format($cost * 0.8, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-neutral-600">Your Cost</p>
                        <p class="text-base font-medium text-neutral-900">${{ number_format($cost * 0.2, 2) }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div> 