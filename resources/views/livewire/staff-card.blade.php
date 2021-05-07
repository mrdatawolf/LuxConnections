<div class="staff m-4 p-2 rounded bg-gray-300 grid grid-cols-3">
    <div class="font-bold col-span-3 text-center">{{ $user->name }}</div>
    <div><x-jet-label value="{{ __('Alias') }}" /></div>
    <div class="col-span-2">{{ $userAliasName }}</div>

    <div class="col-span-3"><x-jet-label value="Supporting:" title="Total members being supported {{ $totalMembersSupported }}"/></div>
    @foreach($membersSupported as $member)
            <div><span class="bg-gray-500 rounded-full pl-2 pr-2">{{ $member->name }}</span></div>
    @endforeach
</div>
