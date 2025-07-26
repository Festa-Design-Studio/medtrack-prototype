{{-- Status Badge Atom Component --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

@props([
    'status' => 'active',
    'text' => 'Status',
    'icon' => null
])

@php
    // Design system status variants
    $statusVariants = [
        'active' => 'bg-success-100 text-success-800 border-success-200',
        'pending' => 'bg-warning-100 text-warning-800 border-warning-200',
        'inactive' => 'bg-neutral-100 text-neutral-600 border-neutral-200',
        'error' => 'bg-error-100 text-error-800 border-error-200',
        'info' => 'bg-primary-100 text-primary-800 border-primary-200'
    ];
    
    $statusClasses = $statusVariants[$status] ?? $statusVariants['active'];
    
    // Status indicators
    $indicators = [
        'active' => 'bg-success-500',
        'pending' => 'bg-warning-500',
        'inactive' => 'bg-neutral-400',
        'error' => 'bg-error-500',
        'info' => 'bg-primary-500'
    ];
    
    $indicatorClass = $indicators[$status] ?? $indicators['active'];
@endphp

<span class="inline-flex items-center px-sm py-xs rounded-md text-base font-medium border {{ $statusClasses }}" 
      role="status" 
      aria-label="Status: {{ $text }}">
    
    {{-- Status Indicator Dot --}}
    <div class="w-2 h-2 rounded-full mr-xs {{ $indicatorClass }}" aria-hidden="true"></div>
    
    {{-- Custom Icon (if provided) --}}
    @if($icon)
        <svg class="w-4 h-4 mr-xs" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
            {!! $icon !!}
        </svg>
    @endif
    
    {{-- Status Text --}}
    <span>{{ $text }}</span>
</span> 