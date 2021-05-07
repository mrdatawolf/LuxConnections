<div class="m-4 p-2 rounded bg-green-200">
    <div class="grid grid-cols-2">
        <div class=" text-center font-bold col-span-2">Add new member</div>
        <div>
            <x-jet-label for="new_member_name" value="{{ __('Name') }}" />
            <x-jet-input wire:model.prevent="newUserName" id="new_member_name" type="text"></x-jet-input>
            @error('new_member_name') <span class="bg-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-span-2"></div>
    <div wire:click.prevent="addMember"><span class="material-icons rounded-full">add</span></div>
</div>
