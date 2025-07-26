{{-- High Contrast Toggle Utility Component --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

@props([
    'currentMode' => false
])

@php
    $toggleId = 'high-contrast-toggle-' . Str::random(8);
@endphp

<div class="flex items-center space-x-sm" role="group" aria-labelledby="contrast-toggle-label">
    <label id="contrast-toggle-label" for="{{ $toggleId }}" class="text-base font-medium text-neutral-900">
        High Contrast Mode
    </label>
    
    <button id="{{ $toggleId }}"
            type="button"
            class="relative min-h-touch min-w-touch inline-flex items-center px-sm py-xs rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 {{ $currentMode ? 'bg-primary-600' : 'bg-neutral-200' }}"
            role="switch"
            aria-checked="{{ $currentMode ? 'true' : 'false' }}"
            aria-label="Toggle high contrast mode">
        
        {{-- Toggle Track --}}
        <span class="sr-only">Toggle high contrast mode</span>
        
        {{-- Toggle Handle --}}
        <span class="inline-block w-5 h-5 bg-white rounded-full shadow-sm transform transition-transform {{ $currentMode ? 'translate-x-5' : 'translate-x-0' }}"
              aria-hidden="true"></span>
        
        {{-- Icons --}}
        <svg class="absolute left-1 w-3 h-3 text-neutral-400 {{ $currentMode ? 'text-white' : '' }}" 
             fill="currentColor" 
             viewBox="0 0 20 20" 
             aria-hidden="true">
            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
        </svg>
        
        <svg class="absolute right-1 w-3 h-3 text-neutral-400 {{ $currentMode ? 'text-white' : '' }}" 
             fill="currentColor" 
             viewBox="0 0 20 20" 
             aria-hidden="true">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
    </button>
    
    {{-- Help Text --}}
    <div class="text-sm text-neutral-600">
        <span class="sr-only">High contrast mode makes text and buttons easier to see</span>
        <span aria-hidden="true">Easier to see</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('{{ $toggleId }}');
    
    if (toggle) {
        toggle.addEventListener('click', function() {
            const isChecked = this.getAttribute('aria-checked') === 'true';
            const newState = !isChecked;
            
            // Update toggle state
            this.setAttribute('aria-checked', newState.toString());
            
            // Update visual state
            const handle = this.querySelector('span');
            if (newState) {
                this.classList.add('bg-primary-600');
                this.classList.remove('bg-neutral-200');
                handle.classList.add('translate-x-5');
                handle.classList.remove('translate-x-0');
                document.documentElement.classList.add('high-contrast');
            } else {
                this.classList.remove('bg-primary-600');
                this.classList.add('bg-neutral-200');
                handle.classList.remove('translate-x-5');
                handle.classList.add('translate-x-0');
                document.documentElement.classList.remove('high-contrast');
            }
            
            // Announce change to screen readers
            const announcement = document.createElement('div');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.className = 'sr-only';
            announcement.textContent = `High contrast mode ${newState ? 'enabled' : 'disabled'}`;
            document.body.appendChild(announcement);
            
            // Remove announcement after a delay
            setTimeout(() => {
                document.body.removeChild(announcement);
            }, 1000);
        });
    }
});
</script> 