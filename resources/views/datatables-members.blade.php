<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Members') }}
    </h2>
    <livewire:members-livewire-datatables searchable="name" exportable/>
</x-app-layout>
