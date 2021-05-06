<div class="staff m-4 p-2 rounded bg-gray-300">
    <div>{{ $staffName }}</div>
    <div>{{ $totalMembersSupported }}</div>
    <div >Supporting:
    </div>
    <div>
        @foreach($membersSupported as $memberName)
        <span class="bg-gray-500 rounded-full pl-2 pr-2">{{ $memberName }}</span>
        @endforeach
    </div>
</div>
