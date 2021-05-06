<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateMember extends Component
{
    public $staffMembers;


    public function mount()
    {
        $this->staffMembers = [];
    }


    public function setLinkedStaffMember()
    {
        dd('set staff to member link');
    }


    public function addMember() {
        dd('add member');
    }


    public function render()
    {
        return view('livewire.create-member');
    }
}
