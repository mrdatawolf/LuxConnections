<div class="m-4 p-2 rounded bg-green-200">
    <div class="grid grid-cols-1">
        <div class="text-center font-bold col-span-2">Add new member</div>
        <div>
            <x-jet-label for="new_member_name" value="{{ __('Name') }}" />
            <x-jet-input type="text" wire:model.prevent="newUserName" class="h-6 w-full" id="new_member_name"/>
            @error('new_member_name') <span class="bg-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-span-2"></div>
    <div wire:click.prevent="addMember"><span class="material-icons rounded-full">add</span></div>
</div>
