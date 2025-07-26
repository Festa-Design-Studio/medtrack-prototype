{{-- Cost Indicator Atom Component --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

@props([
    'amount' => '$0.00',
    'period' => 'month',
    'variant' => 'default'
])

@php
    // Design system color variants
    $variants = [
        'default' => 'bg-success-100 text-success-800 border-success-200',
        'savings' => 'bg-primary-100 text-primary-800 border-primary-200',
        'warning' => 'bg-warning-100 text-warning-800 border-warning-200',
        'error' => 'bg-error-100 text-error-800 border-error-200'
    ];
    
    $variantClasses = $variants[$variant] ?? $variants['default'];
@endphp

<span class="inline-flex items-center px-md py-xs rounded-full text-base font-medium border {{ $variantClasses }}" 
      role="text" 
      aria-label="Cost: {{ $amount }} per {{ $period }}">
    
    {{-- Cost Icon --}}
    <svg class="w-5 h-5 mr-xs" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8.07 7.949 8.433 7.418zM11 12.849v-1.698c.22.071.412.164.567.267.364.532.364.923 0 1.454-.155.103-.346.196-.567.267z"></path>
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6.602 7.766 7.324 8.246 7.676 8.48 8.145 8.663 8.97 8.818a3.126 3.126 0 00.54.117v1.698a2.582 2.582 0 01-.567-.267c-.364-.532-.364-.923 0-1.454.364-.532.97-.569 1.176-.662v.092z" clip-rule="evenodd"></path>
    </svg>
    
    {{-- Cost Amount --}}
    <span class="font-semibold">{{ $amount }}</span>
    
    {{-- Period --}}
    <span class="text-sm ml-xs">/{{ $period }}</span>
</span> 