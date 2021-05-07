<div>
    <div>Members</div>
    <div class="grid lg:grid-cols-3 grid-cols-1">
        @livewire('create-member')
        @foreach($memberIds as $id)
            @livewire('member-card',['memberId' => $id, 'userHasAlias' => $hasAlias, key(['member_'.$id])])
        @endforeach
    </div>
</div>
