<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\User;
use Livewire\Component;

class StaffCard extends Component
{
    public $user;
    public $userId;
    public $userName;
    public $userAliasName;
    public $hasIssues;
    public $membersSupported;
    public $totalMembersSupported;
    public $userHasAlias;

    public $listeners = ['memberStaffLinkUpdated'];

    public function mount() {
        $this->getUser();
        $this->getMembersSupported();
    }

    public function memberUserLinkUpdated($userId, $memberId) {

        if($userId === $this->userId) {
            if(! in_array($memberId, array_keys($this->membersSupported))) {
                $this->membersSupported[$memberId] = Member::find($memberId);
            }
        } else {
            if(in_array($memberId, array_keys($this->membersSupported))) {
                if(isset($this->membersSupported[$memberId])) {
                    unset($this->membersSupported[$memberId]);
                }
            }
        }

        $this->totalMembersSupported = count($this->membersSupported);

    }

    private function getUser() {
        $this->user = User::with('alias')->find($this->userId);
        $this->userAliasName = (empty($this->user->alias)) ? 'unknown' : $this->user->alias->name;
    }

    private function getMembersSupported() {
        $this->membersSupported = $this->user->members;
        $this->totalMembersSupported = count($this->membersSupported);
    }

    public function render()
    {
        return view('livewire.staff-card');
    }
}
