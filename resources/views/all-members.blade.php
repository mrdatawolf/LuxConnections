<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LUX Connections') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-12">
        <div class="col-span-10">
            @livewire('all-member-cards')
        </div>
        <div class="col-span-2">
            @livewire('all-staff-cards')
        </div>
    </div>
</x-app-layout>
