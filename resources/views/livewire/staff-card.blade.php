<div class="staff m-4 p-2 rounded bg-blue-300 grid grid-cols-4 {{ ($specialDisable) ? 'hidden' : '' }}">
    <div class="font-bold col-span-4 text-center"><a href="{{ route('staff-member',['id' => $user->id]) }}">{{ $user->name }}</a></div>
    <div><x-jet-label value="{{ __('Alias') }}" /></div>
    <div class="col-span-3">{{ $userAliasName }}</div>
    <div class="col-span-4">
        <x-jet-label value="Supporting: ({{ $numberOfMembersToDisplay }} shown of {{ $totalMembersSupported }})" title="Showing {{ ($totalMembersSupported < $numberOfMembersToDisplay) ? $numberOfMembersToDisplay : $totalMembersSupported }} of the {{ $totalMembersSupported }} total members being supported!"/>
    </div>
    @foreach($membersDisplayed as $member)
        <div class="text-xs col-span-4  mb-1"><span class="bg-gray-500 rounded-full pl-2 pr-2">{{ $member->name }}</span></div>
    @endforeach
    @if($totalMembersSupported > $numberOfMembersToDisplay)
        <div class="text-xs col-span-4"><span class="bg-gray-500 rounded-full pl-2 pr-2">{{ $totalMembersSupported - $numberOfMembersToDisplay }} more...</span></div>
    @endif
</div>
