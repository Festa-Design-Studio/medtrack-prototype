<div class="flex items-center space-x-4" 
     x-data="{ 
         highContrast: @json($highContrast),
         init() {
             this.applyContrast();
         },
         toggle() {
             this.highContrast = !this.highContrast;
             this.applyContrast();
             @this.call('toggleHighContrast');
         },
         applyContrast() {
             if (this.highContrast) {
                 document.body.classList.add('high-contrast');
             } else {
                 document.body.classList.remove('high-contrast');
             }
         }
     }">
    
    <!-- Toggle Label -->
    <label for="high-contrast-toggle" class="form-label mb-0">
        <span class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
            High Contrast
        </span>
    </label>

    <!-- Toggle Switch -->
    <button 
        type="button"
        id="high-contrast-toggle"
        @click="toggle()"
        class="relative inline-flex min-h-touch w-16 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-senior-primary focus:ring-offset-2"
        :class="highContrast ? 'bg-senior-primary' : 'bg-gray-200'"
        role="switch"
        :aria-checked="highContrast.toString()"
        aria-labelledby="high-contrast-label"
    >
        <span class="sr-only">Toggle high contrast mode</span>
        <span 
            aria-hidden="true"
            class="pointer-events-none inline-block h-8 w-8 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
            :class="highContrast ? 'translate-x-8' : 'translate-x-0'"
        ></span>
    </button>

    <!-- Status Text -->
    <span id="high-contrast-label" class="text-senior text-senior-text-light">
        <span x-show="highContrast" class="font-bold text-green-600">ON</span>
        <span x-show="!highContrast" class="text-gray-500">OFF</span>
    </span>

    <!-- Help Text -->
    <div class="text-sm text-senior-text-light hidden sm:block">
        <p class="flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Easier to see
        </p>
    </div>
</div>
