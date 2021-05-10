<div class="staff m-4 p-2 rounded bg-blue-300 grid grid-cols-4">
    <div class="font-bold col-span-4 text-center">{{ $user->name }}</div>
    <div><x-jet-label value="{{ __('Alias') }}" /></div>
    <div class="col-span-3">{{ $userAliasName }}</div>
    <div class="col-span-4">
        <x-jet-label value="Supporting: ({{ $totalMembersSupported }})" title="Showing {{ $totalMembersSupported }} total members being supported!"/>
    </div>
    @foreach($membersSupported as $member)
        <div class="text-xs m-1"><span class="bg-gray-200 rounded-full pl-2 pr-2"><a href="{{ route('member',['id' => $member->id]) }}">{{ $member->name }}</a></span></div>
    @endforeach
</div>
