{{-- Gentle Button Component --}}
{{-- Generated using MedTrack MCP tools for trauma-informed design --}}

@props([
    'text' => 'Continue',
    'action' => 'primary',
    'size' => 'md'
])

@php
    // Trauma-informed language mapping
    $gentleText = [
        'Submit' => 'Continue',
        'Delete' => 'Remove',
        'Cancel' => 'Go Back',
        'Save' => 'Keep Changes',
        'Update' => 'Apply Changes',
        'Confirm' => 'Proceed',
        'Delete Account' => 'Close Account',
        'Remove Medication' => 'Stop Taking',
        'Delete Appointment' => 'Cancel Appointment'
    ];
    
    $displayText = $gentleText[$text] ?? $text;
    
    // Design system button variants
    $variants = [
        'primary' => 'bg-primary-500 hover:bg-primary-600 text-white focus:ring-primary-500',
        'secondary' => 'bg-neutral-100 hover:bg-neutral-200 text-neutral-700 focus:ring-neutral-500',
        'success' => 'bg-success-500 hover:bg-success-600 text-white focus:ring-success-500',
        'warning' => 'bg-warning-500 hover:bg-warning-600 text-white focus:ring-warning-500',
        'error' => 'bg-error-500 hover:bg-error-600 text-white focus:ring-error-500'
    ];
    
    $variantClasses = $variants[$action] ?? $variants['primary'];
    
    // Design system size variants
    $sizes = [
        'sm' => 'px-sm py-xs text-sm',
        'md' => 'px-md py-sm text-base',
        'lg' => 'px-lg py-md text-lg'
    ];
    
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
@endphp

<button {{ $attributes->merge([
    'class' => "min-h-touch min-w-touch {$sizeClasses} font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors {$variantClasses}",
    'type' => 'button'
]) }}
        aria-label="{{ $displayText }} - {{ $action }} action">
    {{ $displayText }}
</button> 