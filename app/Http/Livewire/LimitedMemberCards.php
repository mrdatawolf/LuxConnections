<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Member;

class LimitedMemberCards extends Component
{
    public $user;
    public $unlinkedMemberIds = [];
    public $memberIds         = [];
    public $hasAlias;
    public $massEntry;
    public $showAllMembers;

    protected $listeners = ['memberAdded', 'memberUserLinkUpdated', 'aliasUpdated'];


    public function mount()
    {
        $this->massEntry      = true;
        $this->showAllMembers = false;
        $this->getUser();
        $this->getMemberIds();
        $this->getSupportedMemberIds();
        $this->checkForAlias();
    }


    private function getUser()
    {
        $id         = auth()->user()->id;
        $this->user = User::with('alias', 'members')->find($id);
    }


    public function memberAdded()
    {
        return redirect()->route('dashboard');
    }


    public function memberUserLinkUpdated()
    {
        return redirect()->route('dashboard');
    }


    public function aliasUpdated()
    {
        return redirect()->route('dashboard');
    }


    public function checkForAlias()
    {
        $this->hasAlias = ! empty($this->user->alias);
    }


    private function getMemberIds()
    {
        $linkedMembers           = Member::has('users')->pluck('id');
        $this->unlinkedMemberIds = Member::whereNotIn('id', $linkedMembers)->pluck('id');
    }


    private function getSupportedMemberIds()
    {
        $this->memberIds = $this->user->members()->orderBy('name')->pluck('id');
        foreach ($this->unlinkedMemberIds as $id) {
            $this->memberIds[] = $id;
        }
    }


    public function render()
    {
        return view('livewire.limited-member-cards');
    }
}
