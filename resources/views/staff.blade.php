<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LUX Staff') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            @livewire('expanded-staff-card',['userId'=>$id])
        </div>
    </div>
</x-app-layout>
