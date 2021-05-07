<div>
    <div>Staff Info</div>
    <div>
        @foreach($userIds as $id)
            @livewire('staff-card',['userId' => $id, key(['staff_'.$id])])
        @endforeach
    </div>
</div>
