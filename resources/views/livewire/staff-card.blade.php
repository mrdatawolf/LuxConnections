<div class="staff m-4 p-2 rounded bg-blue-300 grid grid-cols-4 {{ ($specialDisable) ? 'hidden' : '' }}">
    <div class="font-bold col-span-4 text-center">{{ $user->name }}</div>
    <div><x-jet-label value="{{ __('Alias') }}" /></div>
    <div class="col-span-3">{{ $userAliasName }}</div>

    <div class="col-span-4"><x-jet-label value="Supporting:" title="Total members being supported {{ $totalMembersSupported }}"/></div>
    @foreach($membersSupported as $member)
            <div class="text-xs col-span-2"><span class="bg-gray-500 rounded-full pl-2 pr-2">{{ $member->name }}</span></div>
    @endforeach
</div>
