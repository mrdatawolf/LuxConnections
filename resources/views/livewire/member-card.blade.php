<div class="{{ ($hasIssues) ? 'bg-yellow-300' : 'bg-blue-300' }} m-4 p-2 rounded {{ ($isStaff) ? 'hidden' : '' }}">
    <div class="grid grid-cols-6">
        <div>
            <div class="{{ ($userHasAlias) ? 'hidden' : '' }}"><span wire:click="$set('showConfirmBurdenModal', true)" class="{{ ($isStaff) ? 'bg-green-300' : 'bg-blue-300' }} material-icons rounded-full">fitness_center</span></div>
        </div>
        <div class="font-bold col-span-3">{{ $memberName }}</div>
        <div class="col-span-2">
            <x-jet-label for="linkedStaff" value="{{ __('Link To') }}" />
            <select
                name="linkStaff"
                id="linkStaff"
                class="block w-full mt-1 text-sm"
                wire:model.defer="linkedUserId"
                wire:change="linkMemberToUser">
                <option></option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span title="{{ (empty($userLinkedToMember)) ? '' : $userLinkedToMember->name }}" class="{{ ($userLinkIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">group</span>
        </div>
        <div class="col-span-6">
            &nbsp;
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span wire:click="$set('showConfirmHeardModal', true)" class="{{ ($lastHeardIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full" title="note that you heard from user">record_voice_over</span>
        </div>
        <div class="col-span-3">
            <x-jet-label value="Last heard from"/>
        </div>
        <div class="col-span-2" title="Date a staff member recorded last hearing from the member.">
            {{ (empty($lastHeardDate)) ? 'n/a' : $lastHeardDate->toDateString() }}
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span wire:click="$set('showConfirmReachOutModal', true)" class="{{ ($lastReachedOutTooIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full" title="mote a reach out to member">ring_volume</span>
        </div>
        <div class="col-span-3">
            <x-jet-label title="Of {{ $timesReachedOut }} attempts" value="Lastest Reach Out"/>
        </div>
        <div class="col-span-2">
            {{ (empty($lastReachedOutDate)) ? 'n/a' : $lastReachedOutDate->toDateString() }}
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
    <x-jet-dialog-modal wire:model="showConfirmBurdenModal">
        <x-slot name="title">
            {{ __('Confirm you are seeing double!') }}
        </x-slot>

        <x-slot name="content">
            Confirm that {{ $member->name }} is actually your user account.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showConfirmBurdenModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-burden-button" wire:click="confirmBurden" wire:loading.attr="disabled">
                {{__('Confirm')}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
