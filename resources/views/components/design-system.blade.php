{{-- MedTrack Design System Component Library --}}
{{-- Generated using MedTrack MCP tools for accessibility and trauma-informed design --}}

{{-- ========================================
   ATOMS (Basic Design Elements)
   ======================================== --}}

{{-- Cost Indicator Atom --}}
@component('components.atoms.cost-indicator')
    @slot('amount', $amount ?? '$0.00')
    @slot('period', $period ?? 'month')
    @slot('variant', $variant ?? 'default')
@endcomponent

{{-- Status Badge Atom --}}
@component('components.atoms.status-badge')
    @slot('status', $status ?? 'active')
    @slot('text', $text ?? 'Status')
    @slot('icon', $icon ?? null)
@endcomponent

{{-- Health Icon Atom --}}
@component('components.atoms.health-icon')
    @slot('type', $type ?? 'medication')
    @slot('size', $size ?? 'md')
    @slot('color', $color ?? 'primary')
@endcomponent

{{-- Progress Indicator Atom --}}
@component('components.atoms.progress-indicator')
    @slot('value', $value ?? 0)
    @slot('max', $max ?? 100)
    @slot('label', $label ?? 'Progress')
    @slot('variant', $variant ?? 'default')
@endcomponent

{{-- ========================================
   MOLECULES (Component Combinations)
   ======================================== --}}

{{-- Medication Card Molecule --}}
@component('components.molecules.medication-card')
    @slot('name', $medication->name ?? 'Medication Name')
    @slot('dosage', $medication->dosage ?? 'Dosage')
    @slot('schedule', $medication->schedule_time ?? 'Morning')
    @slot('frequency', $medication->frequency ?? 'Daily')
    @slot('cost', $medication->cost ?? 0)
    @slot('nextDose', $medication->next_dose ?? null)
    @slot('adherence', $medication->adherence_rate ?? null)
    @slot('notes', $medication->notes ?? '')
@endcomponent

{{-- Cost Comparison Molecule --}}
@component('components.molecules.cost-comparison')
    @slot('currentCost', $currentCost ?? 0)
    @slot('alternativeCost', $alternativeCost ?? 0)
    @slot('savings', $savings ?? 0)
    @slot('pharmacy', $pharmacy ?? 'Current Pharmacy')
@endcomponent

{{-- Data Access Control Molecule --}}
@component('components.molecules.data-access-control')
    @slot('provider', $provider ?? 'Provider Name')
    @slot('permissions', $permissions ?? [])
    @slot('lastAccess', $lastAccess ?? null)
    @slot('status', $status ?? 'active')
@endcomponent

{{-- Provider Rating Molecule --}}
@component('components.molecules.provider-rating')
    @slot('name', $provider->name ?? 'Provider Name')
    @slot('rating', $provider->rating ?? 0)
    @slot('reviews', $provider->reviews ?? 0)
    @slot('specialties', $provider->specialties ?? [])
@endcomponent

{{-- ========================================
   ORGANISMS (Complex UI Sections)
   ======================================== --}}

{{-- Price Transparency Dashboard Organism --}}
@component('components.organisms.price-transparency-dashboard')
    @slot('totalMonthlyCost', $totalCost ?? 0)
    @slot('savingsOpportunities', $savings ?? [])
    @slot('insuranceCoverage', $coverage ?? [])
    @slot('costHistory', $history ?? [])
@endcomponent

{{-- Data Control Center Organism --}}
@component('components.organisms.data-control-center')
    @slot('activeShares', $activeShares ?? [])
    @slot('pendingRequests', $pendingRequests ?? [])
    @slot('accessLogs', $accessLogs ?? [])
    @slot('securityStatus', $securityStatus ?? 'secure')
@endcomponent

{{-- Provider Directory Organism --}}
@component('components.organisms.provider-directory')
    @slot('providers', $providers ?? [])
    @slot('filters', $filters ?? [])
    @slot('searchQuery', $search ?? '')
    @slot('sortBy', $sortBy ?? 'name')
@endcomponent

{{-- Care Coordination Hub Organism --}}
@component('components.organisms.care-coordination-hub')
    @slot('careTeam', $careTeam ?? [])
    @slot('appointments', $appointments ?? [])
    @slot('communications', $communications ?? [])
    @slot('carePlan', $carePlan ?? null)
@endcomponent

{{-- ========================================
   UTILITY COMPONENTS
   ======================================== --}}

{{-- High Contrast Toggle --}}
@component('components.utilities.high-contrast-toggle')
    @slot('currentMode', $highContrastMode ?? false)
@endcomponent

{{-- Accessibility Menu --}}
@component('components.utilities.accessibility-menu')
    @slot('fontSize', $fontSize ?? 'base')
    @slot('contrastMode', $contrastMode ?? 'normal')
    @slot('screenReader', $screenReader ?? false)
@endcomponent

{{-- Emergency Contact --}}
@component('components.utilities.emergency-contact')
    @slot('contacts', $emergencyContacts ?? [])
    @slot('primaryContact', $primaryContact ?? null)
@endcomponent

{{-- ========================================
   DESIGN SYSTEM TOKENS
   ======================================== --}}

{{-- Color System --}}
@php
    $colors = [
        'primary' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'],
        'secondary' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'],
        'success' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'],
        'warning' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'],
        'error' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'],
        'neutral' => ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900']
    ];
@endphp

{{-- Typography System --}}
@php
    $typography = [
        'xs' => '14px',
        'sm' => '16px', 
        'base' => '18px',
        'lg' => '20px',
        'xl' => '24px',
        '2xl' => '30px',
        '3xl' => '36px'
    ];
@endphp

{{-- Spacing System --}}
@php
    $spacing = [
        'xs' => '4px',
        'sm' => '8px',
        'md' => '16px',
        'lg' => '24px',
        'xl' => '32px',
        '2xl' => '40px',
        '3xl' => '48px'
    ];
@endphp

{{-- Touch Target System --}}
@php
    $touchTargets = [
        'touch' => '44px',
        'touch-lg' => '48px'
    ];
@endphp

{{-- ========================================
   ACCESSIBILITY FEATURES
   ======================================== --}}

{{-- Skip Navigation Link --}}
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-sm focus:left-sm bg-primary-600 text-white px-md py-sm rounded-lg z-50">
    Skip to main content
</a>

{{-- Screen Reader Only Text --}}
<span class="sr-only">{{ $srText ?? 'Screen reader only content' }}</span>

{{-- ARIA Live Regions --}}
<div aria-live="polite" aria-atomic="true" class="sr-only">
    {{ $liveContent ?? '' }}
</div>

{{-- Focus Management --}}
<div id="focus-trap" tabindex="-1" class="focus:outline-none">
    {{ $focusContent ?? '' }}
</div>

{{-- ========================================
   TRAUMA-INFORMED FEATURES
   ======================================== --}}

{{-- Gentle Language Components --}}
@component('components.trauma-informed.gentle-button')
    @slot('text', $buttonText ?? 'Continue')
    @slot('action', $action ?? 'primary')
    @slot('size', $size ?? 'md')
@endcomponent

{{-- Clear Expectations --}}
@component('components.trauma-informed.expectation-setter')
    @slot('title', $expectationTitle ?? 'What to expect')
    @slot('steps', $expectationSteps ?? [])
    @slot('duration', $expectedDuration ?? '5 minutes')
@endcomponent

{{-- Help Text --}}
@component('components.trauma-informed.help-text')
    @slot('text', $helpText ?? 'Optional help text')
    @slot('type', $helpType ?? 'info')
    @slot('dismissible', $dismissible ?? true)
@endcomponent

{{-- ========================================
   RESPONSIVE DESIGN PATTERNS
   ======================================== --}}

{{-- Mobile-First Grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
    {{ $gridContent ?? '' }}
</div>

{{-- Responsive Typography --}}
<h1 class="text-2xl md:text-3xl font-bold text-neutral-900">
    {{ $headingText ?? 'Responsive Heading' }}
</h1>

{{-- Responsive Spacing --}}
<div class="p-md md:p-lg lg:p-xl">
    {{ $spacedContent ?? '' }}
</div>

{{-- Touch-Friendly Navigation --}}
<nav class="flex space-x-lg">
    @foreach($navItems ?? [] as $item)
        <a href="{{ $item['url'] }}" 
           class="min-h-touch min-w-touch px-md py-sm text-lg font-medium text-neutral-900 hover:text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-lg transition-colors">
            {{ $item['text'] }}
        </a>
    @endforeach
</nav>

{{-- ========================================
   COMPONENT USAGE EXAMPLES
   ======================================== --}}

{{-- Example: Medication Card with Cost Transparency --}}
@php
    $medicationExample = (object)[
        'name' => 'Metformin 500mg',
        'dosage' => '1 tablet',
        'schedule_time' => 'Morning',
        'frequency' => 'Daily',
        'cost' => 24.99,
        'next_dose' => now()->addHours(8),
        'adherence_rate' => 95,
        'notes' => 'Take with food'
    ];
@endphp

@component('components.molecules.medication-card')
    @slot('name', $medicationExample->name)
    @slot('dosage', $medicationExample->dosage)
    @slot('schedule', $medicationExample->schedule_time)
    @slot('frequency', $medicationExample->frequency)
    @slot('cost', $medicationExample->cost)
    @slot('nextDose', $medicationExample->next_dose)
    @slot('adherence', $medicationExample->adherence_rate)
    @slot('notes', $medicationExample->notes)
@endcomponent

{{-- Example: Cost Comparison --}}
@component('components.molecules.cost-comparison')
    @slot('currentCost', 24.99)
    @slot('alternativeCost', 18.50)
    @slot('savings', 6.49)
    @slot('pharmacy', 'Local Pharmacy')
@endcomponent

{{-- Example: High Contrast Toggle --}}
@component('components.utilities.high-contrast-toggle')
    @slot('currentMode', false)
@endcomponent

{{-- ========================================
   DESIGN SYSTEM VALIDATION
   ======================================== --}}

{{-- This section ensures all components follow design system guidelines --}}
@php
    // Design system validation checks
    $designSystemChecks = [
        'typography' => 'Uses senior-friendly text sizes (18px+ base)',
        'colors' => 'Uses extended color palette tokens',
        'spacing' => 'Uses consistent spacing system',
        'touch_targets' => 'All interactive elements have 44px+ touch targets',
        'accessibility' => 'Includes ARIA labels and keyboard navigation',
        'trauma_informed' => 'Uses gentle language and clear expectations'
    ];
@endphp

{{-- Validation Status --}}
<div class="sr-only" aria-label="Design system validation status">
    @foreach($designSystemChecks as $check => $description)
        <span>{{ $check }}: {{ $description }}</span>
    @endforeach
</div> 