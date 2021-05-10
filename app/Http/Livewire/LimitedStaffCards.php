<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;

class LimitedStaffCards extends Component
{
    public $userIds = [];
    public $massEntry;

    public function mount() {
        $this->massEntry = true;
        $this->getStaffIds();
    }


    private function getStaffIds() {
        $this->userIds = User::orderBy('id')->pluck('id');
    }

    public function render()
    {
        return view('livewire.all-staff-cards');
    }
}
