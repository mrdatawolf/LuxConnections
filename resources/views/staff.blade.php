<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff') }}
        </h2>
    </x-slot>
    <livewire:staff-livewire-datatables searchable="name,email" exportable/>
</x-app-layout>
