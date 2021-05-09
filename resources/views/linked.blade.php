<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Staff Relationship') }}
        </h2>
    </x-slot>
    <livewire:linked-livewire-datatables searchable="name" exportable/>
</x-app-layout>
