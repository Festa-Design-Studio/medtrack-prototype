<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component Test - MedTrack</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 min-h-screen">
    <div class="container mx-auto px-xl py-3xl max-w-6xl">
        <h1 class="text-4xl font-bold text-neutral-900 mb-3xl text-center">Component System Test</h1>
        
        <div class="space-y-3xl">
            <!-- Test Health Icon -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Health Icon Component</h2>
                <div class="flex space-x-2xl items-center">
                    <div class="flex flex-col items-center space-y-md">
                        <x-components.atoms.health-icon type="medication" size="sm" color="primary" />
                        <span class="text-sm text-neutral-600">Small Primary</span>
                    </div>
                    <div class="flex flex-col items-center space-y-md">
                        <x-components.atoms.health-icon type="heart" size="md" color="success" />
                        <span class="text-sm text-neutral-600">Medium Success</span>
                    </div>
                    <div class="flex flex-col items-center space-y-md">
                        <x-components.atoms.health-icon type="blood-pressure" size="lg" color="warning" />
                        <span class="text-sm text-neutral-600">Large Warning</span>
                    </div>
                </div>
            </div>

            <!-- Test Cost Indicator -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Cost Indicator Component</h2>
                <div class="flex space-x-xl items-center">
                    <x-components.atoms.cost-indicator amount="$24.99" period="month" variant="default" />
                    <x-components.atoms.cost-indicator amount="$12.50" period="month" variant="savings" />
                    <x-components.atoms.cost-indicator amount="$89.99" period="month" variant="warning" />
                </div>
            </div>

            <!-- Test Status Badge -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Status Badge Component</h2>
                <div class="flex space-x-xl items-center">
                    <x-components.atoms.status-badge status="success" text="Active" />
                    <x-components.atoms.status-badge status="warning" text="Pending" />
                    <x-components.atoms.status-badge status="error" text="Error" />
                </div>
            </div>

            <!-- Test Gentle Button -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Gentle Button Component</h2>
                <div class="flex space-x-xl items-center">
                    <x-components.trauma-informed.gentle-button text="Submit" action="primary" size="md" />
                    <x-components.trauma-informed.gentle-button text="Delete" action="danger" size="md" />
                    <x-components.trauma-informed.gentle-button text="Cancel" action="secondary" size="md" />
                </div>
            </div>

            <!-- Test Medication Card -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Medication Card Component</h2>
                <div class="max-w-2xl">
                    <x-components.molecules.medication-card 
                        name="Lisinopril"
                        dosage="10mg"
                        schedule="Morning"
                        frequency="Daily"
                        cost="15.99"
                        nextDose="2024-01-15 08:00:00"
                        adherence="95"
                        notes="Take with food"
                    />
                </div>
            </div>

            <!-- Test High Contrast Toggle -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">High Contrast Toggle</h2>
                <div class="flex items-center space-x-lg">
                    <x-components.utilities.high-contrast-toggle currentMode="false" />
                    <span class="text-neutral-600">Toggle high contrast mode</span>
                </div>
            </div>

            <!-- Test Component -->
            <div class="card p-2xl">
                <h2 class="text-2xl font-semibold mb-xl text-neutral-900">Test Component</h2>
                <x-test-component />
            </div>
        </div>

        <div class="mt-3xl p-xl bg-green-100 border border-green-300 rounded-lg">
            <h3 class="text-xl font-semibold text-green-800 mb-md">✅ Component System Status</h3>
            <p class="text-green-700 text-lg">If you can see all the components above, the system is working correctly!</p>
        </div>
    </div>
</body>
</html> 