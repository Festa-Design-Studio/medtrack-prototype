<div class="max-w-7xl mx-auto py-3xl px-md sm:px-lg lg:px-xl">
    <div class="mb-2xl">
        <h1 class="text-3xl font-bold text-neutral-900 mb-md">Good {{ now()->format('A') === 'AM' ? 'Morning' : 'Evening' }}!</h1>
        <p class="text-lg text-neutral-600">Here's your health summary for today</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-xl">
        <!-- Today's Medications -->
        <div class="card">
            <div class="p-xl border-b border-neutral-200">
                <h2 class="text-xl font-semibold text-neutral-900 flex items-center">
                    <x-components.atoms.health-icon type="medication" size="md" color="primary" class="mr-md" />
                    Today's Medications
                </h2>
            </div>
            <div class="p-xl">
                @if($medications->count() > 0)
                    <div class="space-y-lg">
                        @foreach($medications as $medication)
                            <div class="p-lg bg-neutral-50 rounded-lg border border-neutral-200">
                                <h3 class="font-medium text-neutral-900 mb-sm">{{ $medication->name }}</h3>
                                <p class="text-base text-neutral-600">{{ $medication->dosage }} • {{ $medication->schedule_time }}</p>
                                @if($medication->notes)
                                    <p class="text-sm text-neutral-500 mt-sm">{{ $medication->notes }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-xl">
                        <x-components.trauma-informed.gentle-button 
                            text="Manage Medications"
                            action="primary"
                            size="md"
                            href="{{ route('medications') }}"
                            class="w-full justify-center">
                            Manage Medications
                        </x-components.trauma-informed.gentle-button>
                    </div>
                @else
                    <div class="text-center py-xl">
                        <p class="text-neutral-600 mb-lg">No medications added yet</p>
                        <x-components.trauma-informed.gentle-button 
                            text="Add Your First Medication"
                            action="primary"
                            size="md"
                            href="{{ route('medications') }}">
                            Add Your First Medication
                        </x-components.trauma-informed.gentle-button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Vitals -->
        <div class="card">
            <div class="p-xl border-b border-neutral-200">
                <h2 class="text-xl font-semibold text-neutral-900 flex items-center">
                    <x-components.atoms.health-icon type="vitals" size="md" color="primary" class="mr-md" />
                    Recent Vitals
                </h2>
            </div>
            <div class="p-xl">
                @if($recentVitals->count() > 0)
                    <div class="space-y-lg">
                        @foreach($recentVitals->take(3) as $vital)
                            <div class="p-lg bg-neutral-50 rounded-lg border border-neutral-200">
                                <div class="flex justify-between items-start">
                                    <div class="space-y-sm">
                                        @if($vital->blood_pressure)
                                            <p class="text-base font-medium text-neutral-900">BP: {{ $vital->blood_pressure }}</p>
                                        @endif
                                        @if($vital->blood_sugar)
                                            <p class="text-base font-medium text-neutral-900">Blood Sugar: {{ $vital->blood_sugar }} mg/dL</p>
                                        @endif
                                        @if($vital->weight)
                                            <p class="text-base font-medium text-neutral-900">Weight: {{ $vital->weight }} lbs</p>
                                        @endif
                                        @if($vital->mood)
                                            <p class="text-base font-medium text-neutral-900">Mood: {{ $vital->mood }}</p>
                                        @endif
                                    </div>
                                    <span class="text-sm text-neutral-600">
                                        {{ $vital->recorded_at->format('M j') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-xl">
                        <x-components.trauma-informed.gentle-button 
                            text="View All Vitals"
                            action="secondary"
                            size="md"
                            href="{{ route('vitals') }}"
                            class="w-full justify-center">
                            View All Vitals
                        </x-components.trauma-informed.gentle-button>
                    </div>
                @else
                    <div class="text-center py-xl">
                        <p class="text-neutral-600 mb-lg">No vitals recorded yet</p>
                        <x-components.trauma-informed.gentle-button 
                            text="Log Your First Reading"
                            action="primary"
                            size="md"
                            href="{{ route('vitals') }}">
                            Log Your First Reading
                        </x-components.trauma-informed.gentle-button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Upcoming Appointments -->
        <div class="card">
            <div class="p-xl border-b border-neutral-200">
                <h2 class="text-xl font-semibold text-neutral-900 flex items-center">
                    <x-components.atoms.health-icon type="appointment" size="md" color="primary" class="mr-md" />
                    Upcoming Appointments
                </h2>
            </div>
            <div class="p-xl">
                @if($upcomingAppointments->count() > 0)
                    <div class="space-y-lg">
                        @foreach($upcomingAppointments as $appointment)
                            <div class="p-lg bg-neutral-50 rounded-lg border border-neutral-200">
                                <h3 class="font-medium text-neutral-900 mb-sm">{{ $appointment->title }}</h3>
                                <p class="text-base text-neutral-600">
                                    {{ $appointment->appointment_at->format('M j, Y \a\t g:i A') }}
                                </p>
                                @if($appointment->location)
                                    <p class="text-sm text-neutral-500 mt-sm">{{ $appointment->location }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-xl">
                        <p class="text-neutral-600">No upcoming appointments</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-3xl">
        <div class="mb-xl">
            <h2 class="text-2xl font-semibold text-neutral-900 mb-md">Quick Actions</h2>
            <p class="text-lg text-neutral-600">Access your most important health tools</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-lg">
            <x-components.trauma-informed.gentle-button 
                text="Log Vitals"
                action="primary"
                size="lg"
                href="{{ route('vitals') }}"
                class="justify-center">
                <x-components.atoms.health-icon type="vitals" size="md" color="primary" class="mr-md" />
                Log Vitals
            </x-components.trauma-informed.gentle-button>
            
            <x-components.trauma-informed.gentle-button 
                text="Add Medication"
                action="secondary"
                size="lg"
                href="{{ route('medications') }}"
                class="justify-center">
                <x-components.atoms.health-icon type="medication" size="md" color="neutral" class="mr-md" />
                Add Medication
            </x-components.trauma-informed.gentle-button>
            
            <x-components.trauma-informed.gentle-button 
                text="Schedule Appointment"
                action="secondary"
                size="lg"
                href="#"
                class="justify-center">
                <x-components.atoms.health-icon type="appointment" size="md" color="neutral" class="mr-md" />
                Schedule Appointment
            </x-components.trauma-informed.gentle-button>
            
            <x-components.trauma-informed.gentle-button 
                text="View Reports"
                action="secondary"
                size="lg"
                href="#"
                class="justify-center">
                <x-components.atoms.health-icon type="provider" size="md" color="neutral" class="mr-md" />
                View Reports
            </x-components.trauma-informed.gentle-button>
        </div>
    </div>
</div>
