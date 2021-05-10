<div class="grid grid-cols-12 {{ ($hasIssues) ? 'bg-yellow-200' : 'bg-blue-300' }} m-1 pl-2 pr-1 pt-2 rounded {{ ($isStaff) ? 'hidden' : '' }}">

    <div class="col-span-2">
        <div class="{{ ($userHasAlias) ? 'hidden' : '' }}" title="Associate this member to your login account."><span wire:click="$set('showConfirmBurdenModal', true)" class="{{ ($isStaff) ? 'bg-green-300' : 'bg-blue-300' }} material-icons rounded-full">fitness_center</span></div>
    </div>
    <div class="font-bold col-start-2 col-span-10"><x-jet-input type="text" class="discord_name p-0 m-0 w-full border-none" title="Member's discord name" value="{{ $memberName }}"/></div>
    <div class="col-span-12">
        <x-jet-input type="text" wire:model="fullDiscordId" wire:change="changeFullDiscordId" class="p-0 m-0 w-full border-none" value="{{ $fullDiscordId }}" placeholder="Full Discord Id"/>
    </div>
    <div class="col-span-2">
        <span title="{{ ($userLinkIssue) ? 'There are no staff members assigned to this user!' : 'This user is supported by ' . $linkedUser->name }}" class="{{ ($userLinkIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">group</span>
    </div>
    <div class="h-6 col-span-3">
        <x-jet-label for="linkedStaff" value="{{ __('Link To') }}" class="block w-full mt-1 text-sm"/>
    </div>
    <div class="p-0 m-0 col-span-7">
        <select
            name="linkStaff"
            id="linkStaff"
            class="p-0 m-0 block w-full mt-1 text-sm"
            title="Select a staff member to support this member."
            wire:model.defer="linkedUserId"
            wire:change="linkMemberToUser">
            <option></option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-span-2">
        <span wire:click="$set('showConfirmHeardModal', true)" class="{{ ($lastHeardIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full" title="{{ ($lastHeardIssue) ? 'This user has not been heard from in a long time.' : 'This user has been heard from in the last 30 days.' }} Click to note that you heard from user.">record_voice_over</span>
    </div>
    <div class="col-span-6">
        <x-jet-label value="Last heard from"/>
    </div>
    <div class="col-span-4 text-sm" title="Date a staff member recorded last hearing from the member.">
        {{ (empty($lastHeardDate)) ? 'n/a' : $lastHeardDate->toDateString() }}
    </div>
    <div class="col-span-2">
        <span wire:click="$set('showConfirmReachOutModal', true)" class="{{ ($lastReachedOutTooIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full" title="{{ ($lastReachedOutTooIssue) ? 'This member as NOT been reached out to in the last 30 days.' : 'This member as been reached out to in the last 30 days.' }} CLick to note that you reached out to them.">ring_volume</span>
    </div>
    <div class="col-span-6 text-sm">
        <x-jet-label title="Of {{ $timesReachedOut }} attempts" value="Lastest Reach Out"/>
    </div>
    <div class="col-span-4 text-sm"  title="Date a staff member recorded reaching out to the member.">
        {{ (empty($lastReachedOutDate)) ? 'n/a' : $lastReachedOutDate->toDateString() }}
    </div>
    <div class="col-start-2 col-span-10">
        <x-jet-input type="textarea" wire:model="note" wire:change="changeNotes" class="h-20 w-full" value="{{ $note }}" placeholder="Note(s)" />
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
