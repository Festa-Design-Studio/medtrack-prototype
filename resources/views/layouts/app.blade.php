<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MedTrack') }} - Senior-Friendly Health Tracker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-senior-bg-light">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center">
                            <div>
                                {{ $header }}
                            </div>
                            
                            <!-- High Contrast Toggle in Header -->
                            <div class="flex items-center">
                                <livewire:high-contrast-toggle />
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 mt-12">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-senior text-senior-text-light">
                                MedTrack - Helping seniors manage their health with confidence
                            </p>
                            <p class="text-sm text-senior-text-light mt-1">
                                Built with accessibility and trauma-informed care in mind
                            </p>
                        </div>
                    </div>
                    
                    <!-- Emergency Contact Info -->
                    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <h3 class="text-senior font-semibold text-blue-900 mb-2">
                            📞 Emergency Contacts
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                            <div>
                                <p class="font-medium text-blue-900">Emergency: 911</p>
                            </div>
                            <div>
                                <p class="font-medium text-blue-900">Poison Control:</p>
                                <p class="text-blue-800">1-800-222-1222</p>
                            </div>
                            <div>
                                <p class="font-medium text-blue-900">Your Doctor:</p>
                                <p class="text-blue-800">Add in profile settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
