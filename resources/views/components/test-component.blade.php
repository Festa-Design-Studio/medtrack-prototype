{{-- Test Component to verify component system is working --}}
<div class="p-4 bg-green-100 border border-green-300 rounded-lg">
    <h3 class="text-lg font-semibold text-green-800">Component System Test</h3>
    <p class="text-green-700">If you can see this, the component system is working!</p>
    
    {{-- Test the health icon component --}}
    <div class="mt-2">
        <x-components.atoms.health-icon type="medication" size="md" color="primary" />
        <span class="ml-2 text-sm text-green-600">Health Icon Component</span>
    </div>
    
    {{-- Test the cost indicator component --}}
    <div class="mt-2">
        <x-components.atoms.cost-indicator amount="$24.99" period="month" variant="default" />
    </div>
    
    {{-- Test the status badge component --}}
    <div class="mt-2">
        <x-components.atoms.status-badge status="success" text="Working" />
    </div>
</div> 