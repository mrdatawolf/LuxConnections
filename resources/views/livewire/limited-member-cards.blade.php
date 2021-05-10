<div>
    <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @livewire('create-member')
        @foreach($memberIds as $id)
            @livewire('member-card',['memberId' => $id, 'userHasAlias' => $hasAlias, key(['member_'.$id])])
        @endforeach
    </div>
</div>
