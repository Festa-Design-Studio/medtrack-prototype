<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MedTrack - Senior-friendly health tracking application addressing healthcare pain points from 1,611 public comments">

        <title>MedTrack - Senior-Friendly Health Tracker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-neutral-50 min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-neutral-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-primary-600">🏥 MedTrack</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-neutral-600 hover:text-neutral-900 px-3 py-2 rounded-md text-sm font-medium">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary">
                                        Get Started
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-primary-50 to-primary-100 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-5xl font-bold text-neutral-900 mb-6">
                        Transforming Healthcare for 
                        <span class="text-primary-600">Seniors</span>
                    </h1>
                    <p class="text-xl text-neutral-600 mb-8 max-w-3xl mx-auto">
                        Built from <strong>1,611 public comments</strong> on healthcare pain points, MedTrack addresses real frustrations with accessible, senior-friendly digital health solutions.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="btn-primary text-lg px-8 py-4">
                            Try MedTrack Free
                        </a>
                        <a href="#how-it-works" class="btn-secondary text-lg px-8 py-4">
                            Learn How It Works
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Problem Statement -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-neutral-900 mb-6">
                        The Problem We're Solving
                    </h2>
                    <p class="text-xl text-neutral-600 max-w-4xl mx-auto">
                        Based on analysis of <strong>1,611 public comments</strong> from CMS healthcare policy feedback, we identified critical pain points that MedTrack addresses:
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Price Transparency -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-warning-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">💰</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Price Transparency</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "Patients should know costs BEFORE receiving care"
                        </blockquote>
                        <p class="text-neutral-700">
                            MedTrack provides upfront cost information for medications and appointments, helping seniors plan their healthcare expenses.
                        </p>
                    </div>

                    <!-- Data Access -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">📱</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Data Access</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "Real-time, machine-readable access to our complete health information"
                        </blockquote>
                        <p class="text-neutral-700">
                            One-click access to health records with granular sharing controls and digital-first communication.
                        </p>
                    </div>

                    <!-- Interoperability -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">🔄</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Interoperability</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "1 in 10 patients have had to redo a test due to lack of information access"
                        </blockquote>
                        <p class="text-neutral-700">
                            Test history tracking and care team coordination to prevent duplicate procedures.
                        </p>
                    </div>

                    <!-- Security -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-error-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">🔒</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Security & Privacy</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "This cyber risk could pose a huge personal identity and information theft"
                        </blockquote>
                        <p class="text-neutral-700">
                            Privacy dashboard with access logs and local-first data storage options.
                        </p>
                    </div>

                    <!-- Information Blocking -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-neutral-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">🚫</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Information Blocking</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "No mechanism to report information blocking from within the EHR"
                        </blockquote>
                        <p class="text-neutral-700">
                            Provider transparency ratings and reporting tools for data sharing issues.
                        </p>
                    </div>

                    <!-- Competition -->
                    <div class="bg-neutral-50 p-8 rounded-xl border border-neutral-200">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-info-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl">🏢</span>
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-900">Market Competition</h3>
                        </div>
                        <blockquote class="text-neutral-600 italic mb-4">
                            "I might go out of the area if I knew what the costs were elsewhere"
                        </blockquote>
                        <p class="text-neutral-700">
                            Multi-provider pricing comparison and geographic cost analysis tools.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Target Audience -->
        <section class="py-20 bg-neutral-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-neutral-900 mb-6">
                        Designed for Real People
                    </h2>
                    <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                        MedTrack is built specifically for seniors and caregivers, addressing the unique challenges they face in navigating the healthcare system.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Seniors -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-neutral-200">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-3xl">👴👵</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-neutral-900">Older Adults</h3>
                                <p class="text-neutral-600">Primary users aged 65+</p>
                            </div>
                        </div>
                        <ul class="space-y-3 text-neutral-700">
                            <li class="flex items-start">
                                <span class="text-primary-600 mr-2">✓</span>
                                Large, easy-to-read text (18px+ base font)
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary-600 mr-2">✓</span>
                                Touch-friendly buttons (44px+ minimum)
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary-600 mr-2">✓</span>
                                High contrast mode support
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary-600 mr-2">✓</span>
                                Simple, intuitive navigation
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary-600 mr-2">✓</span>
                                Trauma-informed, gentle language
                            </li>
                        </ul>
                    </div>

                    <!-- Caregivers -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-neutral-200">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mr-4">
                                <span class="text-3xl">👨‍👩‍👧‍👦</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-neutral-900">Caregivers</h3>
                                <p class="text-neutral-600">Family members and professional caregivers</p>
                            </div>
                        </div>
                        <ul class="space-y-3 text-neutral-700">
                            <li class="flex items-start">
                                <span class="text-success-600 mr-2">✓</span>
                                Shared access to health records
                            </li>
                            <li class="flex items-start">
                                <span class="text-success-600 mr-2">✓</span>
                                Remote monitoring capabilities
                            </li>
                            <li class="flex items-start">
                                <span class="text-success-600 mr-2">✓</span>
                                Care team coordination tools
                            </li>
                            <li class="flex items-start">
                                <span class="text-success-600 mr-2">✓</span>
                                Emergency alert systems
                            </li>
                            <li class="flex items-start">
                                <span class="text-success-600 mr-2">✓</span>
                                Medication adherence tracking
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section id="how-it-works" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-neutral-900 mb-6">
                        How MedTrack Works
                    </h2>
                    <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                        Our RFI-centered design approach transforms policy feedback into practical solutions
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">📊</span>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 mb-4">1. Research-Driven</h3>
                        <p class="text-neutral-600">
                            Analyzed 1,611 public comments from CMS healthcare policy feedback to identify real pain points
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">🎨</span>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 mb-4">2. Senior-Focused Design</h3>
                        <p class="text-neutral-600">
                            WCAG AA compliant with large text, touch-friendly buttons, and trauma-informed UX
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 bg-warning-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">🚀</span>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 mb-4">3. Practical Solutions</h3>
                        <p class="text-neutral-600">
                            Direct implementation of features that address documented healthcare frustrations
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Preview -->
        <section class="py-20 bg-neutral-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-neutral-900 mb-6">
                        Key Features
                    </h2>
                    <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                        Built with Laravel, Livewire, and our custom MedTrack MCP server for enhanced development
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">💊</span>
                        </div>
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Medication Tracking</h3>
                        <p class="text-neutral-600 text-sm">
                            Manage medications with cost transparency and adherence monitoring
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                        <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">📈</span>
                        </div>
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Vitals Logging</h3>
                        <p class="text-neutral-600 text-sm">
                            Track blood pressure, blood sugar, weight, and mood with easy data entry
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                        <div class="w-12 h-12 bg-warning-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">📅</span>
                        </div>
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Appointment Management</h3>
                        <p class="text-neutral-600 text-sm">
                            Schedule and track appointments with cost estimation
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                        <div class="w-12 h-12 bg-info-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">🔐</span>
                        </div>
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Privacy Controls</h3>
                        <p class="text-neutral-600 text-sm">
                            Granular data sharing controls and access logs
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-primary-600">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Ready to Transform Your Healthcare Experience?
                </h2>
                <p class="text-xl text-primary-100 mb-8">
                    Join the movement to make healthcare more accessible, transparent, and user-friendly for seniors and caregivers.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-primary-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-neutral-100 transition-colors">
                        Start Using MedTrack
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-primary-600 transition-colors">
                        Sign In
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-neutral-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">🏥 MedTrack</h3>
                        <p class="text-neutral-400">
                            Senior-friendly health tracking built from real user feedback and policy analysis.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Created By</h4>
                        <p class="text-neutral-400">
                            <a href="https://festa.design/" target="_blank" class="text-primary-400 hover:text-primary-300 underline">Festa Design Studio</a><br>
                            For Civic Hack DC 2024
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Technology</h4>
                        <ul class="text-neutral-400 space-y-2">
                            <li>Laravel 12 + Livewire 3</li>
                            <li>Tailwind CSS</li>
                            <li>SQLite Database</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Research Foundation</h4>
                        <ul class="text-neutral-400 space-y-2">
                            <li>1,611 CMS Public Comments</li>
                            <li>Healthcare Interoperability</li>
                            <li>Senior Accessibility</li>
                            <li>Trauma-Informed Design</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-neutral-800 mt-8 pt-8 text-center text-neutral-400">
                    <p>
                        Built with ❤️ for senior health and wellness. 
                        This project demonstrates how participatory democracy can drive user-centered technology development.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
