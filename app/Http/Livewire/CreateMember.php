<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class CreateMember extends Component
{
    public $staffMembers;
    public $newUserName;


    public function mount()
    {
        $this->staffMembers = [];
    }


    public function setLinkedStaffMember()
    {
        dd('set staff to member link');
    }


    public function addMember() {
        if(! empty($this->newUserName)) {
            if(! Member::where('name',$this->newUserName)->exists()) {
                $newMember       = new Member();
                $newMember->name = $this->newUserName;
                $newMember->save();
                $this->newUserName = null;
                $this->emit('memberAdded', $newMember->id);
            }
            else {
                $this->addError('new_member_name', 'duplicate name!');
            }
        }
    }


    public function render()
    {
        return view('livewire.create-member');
    }
}
