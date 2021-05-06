<div class="m-4 p-2 rounded bg-green-200">
    <div class="grid grid-cols-3">
        <div class="title text-center col-span-2">input members name</div>
        <div>
            <x-jet-label for="linkedStaff" value="{{ __('Link Member to:') }}" />
            <select
                name="linkedStaff"
                id="linkedStaff"
                class="block w-full mt-1 text-sm"
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

        </div>
        <div class="col-span-4">

        </div>
        <div title="">

        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>

        </div>
        <div class="col-span-2">

        </div>
        <div class="col-span-3">

        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>

        </div>
        <div class="col-span-2">

        </div>
        <div class="col-span-3">

        </div>
    </div>
    <div wire:click="addMember"><span class="material-icons rounded-full">add</span></div>
</div>

