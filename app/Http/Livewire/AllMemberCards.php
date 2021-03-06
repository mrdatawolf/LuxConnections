<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Member;

class AllMemberCards extends Component
{
    public $user;
    public $allMembers;
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
        $this->getAllMembers();
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


    private function getAllMembers()
    {
        $this->allMembers = Member::orderBy('name')->get();
        $this->memberIds  = $this->allMembers->pluck('id');
    }


    public function render()
    {
        return view('livewire.all-member-cards');
    }
}
