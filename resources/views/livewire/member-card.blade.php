<div class="{{ ($hasIssues) ? 'bg-yellow-300' : 'bg-blue-300' }} m-4 p-2 rounded">
    <div>
        <div class="title text-center">{{ $memberName }}</div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span title="{{ $staffLinkedToMember }}" class="{{ ($multipleStaffLinked) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full" title="supported by: 2">group</span>
        </div>
        <div class="col-span-4">
            Times reached out too:
        </div>
        <div title="Ambear x3, Brealok x4">
            {{ $timesReachedOut }}
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span class="{{ ($lastHeardIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">record_voice_over</span>
        </div>
        <div class="col-span-2">
            Last heard:
        </div>
        <div class="col-span-3">
            {{ $lastHeardDate->toDateString() }}
        </div>
    </div>
    <div class="grid grid-cols-6 text-left">
        <div>
            <span class="{{ ($lastReachedOutTooIssue) ? 'bg-red-600' : 'bg-green-600' }} material-icons rounded-full">ring_volume</span>
        </div>
        <div class="col-span-2">
            Reached out too:
        </div>
        <div class="col-span-3">
            {{ $lastReachedOutToDate->toDateString() }}
        </div>
    </div>
</div>
