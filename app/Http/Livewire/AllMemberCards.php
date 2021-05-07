<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Member;

class AllMemberCards extends Component
{
    public $memberIds = [];
    public $hasAlias;
    public $massEntry;
    protected $listeners = ['memberAdded', 'memberUserLinkUpdated', 'aliasUpdated'];

    public function mount() {
        $this->massEntry = true;
        $this->getMemberIds();
        $this->checkForAlias();
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

    public function checkForAlias() {
        $id=auth()->user()->id;
        $user = User::with('alias')->find($id);
        $this->hasAlias = ! empty($user->alias);
    }


    private function getMemberIds() {
        $this->memberIds = Member::orderBy('id')->pluck('id');
    }

    public function render()
    {
        return view('livewire.all-member-cards');
    }
}
