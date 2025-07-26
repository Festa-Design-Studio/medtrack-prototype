<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-senior-text leading-tight">
            {{ __('Your Vital Signs') }}
        </h2>
    </x-slot>

    <livewire:vitals-logger />
</x-app-layout> 