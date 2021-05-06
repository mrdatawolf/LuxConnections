<div class="{{ ($hasIssues) ? 'bg-yellow-300' : 'bg-blue-300' }} m-4 p-2 rounded">
    <div class="grid grid-cols-3">
        <div class="title text-center col-span-2">{{ $memberName }}</div>
        <div>
            <x-jet-label for="linkedStaff" value="{{ __('Link Member to:') }}" />
            <select
                name="linkedStaff"
                id="linkedStaff"
                class="block w-full mt-1 text-sm"
                wire:model.defer="linkedStaffMemberId"
                wire:change="updateLinkedStaffMember">
                <option></option>
                @foreach($staffMembers as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span title="{{ $staffNamesLinkedToMember }}" class="{{ ($multipleStaffLinked) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">group</span>
        </div>
        <div class="col-span-4">
            Times reached out too:
        </div>
        <div title="Ambear x3, Brealok x4">
            {{ $timesReachedOut }}
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span wire:click="$set('showConfirmHeardModal', true)" class="{{ ($lastHeardIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">record_voice_over</span>
        </div>
        <div class="col-span-2">
            Last heard:
        </div>
        <div class="col-span-3">
            {{ $lastHeardDate->toDateString() }}
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span wire:click="$set('showConfirmReachOutModal', true)" class="{{ ($lastReachedOutTooIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">ring_volume</span>
        </div>
        <div class="col-span-2">
            Reached out too:
        </div>
        <div class="col-span-3">
            {{ $lastReachedOutToDate->toDateString() }}
        </div>
    </div>

    <!-- modals -->
    <x-jet-dialog-modal wire:model="showConfirmHeardModal">
        <x-slot name="title">
            {{ __('Confirm Heard From') }}
        </x-slot>

        <x-slot name="content">
            Confirm you heard the member
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showConfirmHeardModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-heard-button" wire:click="confirmHeard" wire:loading.attr="disabled">
            {{__('Confirm')}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="showConfirmReachOutModal">
        <x-slot name="title">
            {{ __('Confirm Reached Out To') }}
        </x-slot>

        <x-slot name="content">
            Confirm you reached out to the member
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showConfirmReachOutModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-heard-button" wire:click="confirmReachOut" wire:loading.attr="disabled">
            {{__('Confirm')}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
