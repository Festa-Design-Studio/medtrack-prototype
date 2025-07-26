{{-- Cost Comparison Molecule Component --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

@props([
    'currentCost' => 0,
    'alternativeCost' => 0,
    'savings' => 0,
    'pharmacy' => 'Current Pharmacy'
])

@php
    // Calculate savings percentage
    $savingsPercentage = $currentCost > 0 ? round(($savings / $currentCost) * 100) : 0;
    
    // Determine savings variant
    $savingsVariant = $savingsPercentage >= 20 ? 'success' : ($savingsPercentage >= 10 ? 'warning' : 'info');
@endphp

<div class="card border border-neutral-200" 
     role="region" 
     aria-labelledby="cost-comparison-title">
    
    <div class="p-lg">
        <h3 id="cost-comparison-title" class="text-xl font-semibold text-neutral-900 mb-md">
            Cost Comparison
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            {{-- Current Cost --}}
            <div class="text-center">
                <h4 class="text-base font-medium text-neutral-700 mb-sm">Current Cost</h4>
                <div class="text-2xl font-bold text-neutral-900">
                    ${{ number_format($currentCost, 2) }}
                </div>
                <p class="text-sm text-neutral-500 mt-xs">per month</p>
            </div>
            
            {{-- Alternative Cost --}}
            <div class="text-center">
                <h4 class="text-base font-medium text-neutral-700 mb-sm">Alternative Cost</h4>
                <div class="text-2xl font-bold text-success-600">
                    ${{ number_format($alternativeCost, 2) }}
                </div>
                <p class="text-sm text-neutral-500 mt-xs">at {{ $pharmacy }}</p>
            </div>
            
            {{-- Potential Savings --}}
            <div class="text-center">
                <h4 class="text-base font-medium text-neutral-700 mb-sm">Potential Savings</h4>
                <div class="text-2xl font-bold text-success-600">
                    ${{ number_format($savings, 2) }}
                </div>
                <p class="text-sm text-success-600 font-medium mt-xs">
                    ({{ $savingsPercentage }}% less)
                </p>
            </div>
        </div>
        
        {{-- Savings Indicator --}}
        @if($savings > 0)
            <div class="mt-lg p-md bg-success-50 border border-success-200 rounded-lg">
                <div class="flex items-center space-x-sm">
                    <x-components.atoms.health-icon type="cost" size="md" color="success" />
                    <div>
                        <h5 class="text-base font-medium text-success-800">
                            Savings Opportunity Found!
                        </h5>
                        <p class="text-sm text-success-700">
                            You could save ${{ number_format($savings, 2) }} per month by switching to {{ $pharmacy }}.
                        </p>
                    </div>
                </div>
            </div>
        @endif
        
        {{-- Action Buttons --}}
        <div class="mt-lg flex flex-col sm:flex-row gap-sm">
            <button class="min-h-touch min-w-touch px-lg py-md bg-primary-500 hover:bg-primary-600 text-white text-base font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors"
                    aria-label="Switch to {{ $pharmacy }} to save ${{ number_format($savings, 2) }} per month">
                Switch to {{ $pharmacy }}
            </button>
            
            <button class="min-h-touch min-w-touch px-lg py-md bg-neutral-100 hover:bg-neutral-200 text-neutral-700 text-base font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 transition-colors"
                    aria-label="View more pharmacy options">
                View More Options
            </button>
        </div>
        
        {{-- Additional Information --}}
        <div class="mt-md text-sm text-neutral-600">
            <p class="mb-xs">
                <span class="font-medium">Note:</span> Prices may vary based on insurance coverage and pharmacy location.
            </p>
            <p>
                <span class="font-medium">Tip:</span> Call your insurance provider to confirm coverage before switching.
            </p>
        </div>
    </div>
</div> 