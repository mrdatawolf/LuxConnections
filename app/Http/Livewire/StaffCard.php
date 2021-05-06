<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StaffCard extends Component
{
    public $staffId;
    public $staffName;
    public $hasIssues;
    public $membersSupported;
    public $totalMembersSupported;

    public function mount($staffId) {
        $this->staffId = $staffId;

        $this->getStaffName();
        $this->getMembersSupported();
    }

    private function getStaffName() {
        $staffNames = [1 => 'Phylast', 2 => 'Ambear', 3 => 'Braelok'];
        $this->staffName = $staffNames[$this->staffId];

    }

    private function getMembersSupported() {
        $membersSupported = [
            1 => [1 => '1llusionist#1981'],
            2 => [
                1 => '1llusionist#1981',
                2 => '1one#1586'
            ],
            3 => [3 => 'à¹–Ì¶Ì¶Ì¶Î¶ÍœÍ¡ GrimmÎ¶ÍœÍ¡à¹–#1817']];
        $this->totalMembersSupported = count($membersSupported[$this->staffId]);
        $this->membersSupported = $membersSupported[$this->staffId];
    }

    public function render()
    {
        return view('livewire.staff-card');
    }
}
