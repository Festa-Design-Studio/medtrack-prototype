<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-senior-text leading-tight">
            {{ __('Your Medications') }}
        </h2>
    </x-slot>

    <livewire:medication-tracker />
</x-app-layout> 