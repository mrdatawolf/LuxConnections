<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-9">
        <div class="members col-span-7">
            <div class="title">Members</div>
            <div class="body grid lg:grid-cols-3 grid-cols-1">
                @livewire('create-member')
                @livewire('member-card',['memberId' => 1])
                @livewire('member-card',['memberId' => 2])
                @livewire('member-card',['memberId' => 3])
                @livewire('member-card',['memberId' => 4])
            </div>


        </div>
        <div class="staff col-span-2">
            <div class="title">Staff</div>
            <div class="body">
                @livewire('create-staff')
                @livewire('staff-card',['staffId' => 1])
                @livewire('staff-card',['staffId' => 2])
                @livewire('staff-card',['staffId' => 3])
            </div>
        </div>
    </div>
</x-app-layout>
