<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class MemberCard extends Component
{
    public $memberId;
    public $memberName;
    public $hasIssues;
    public $multipleStaffLinked;
    public $lastHeardIssue;
    public $lastReachedOutTooIssue;
    public $timesReachedOut;
    public $dateLastReachedOut;
    public $lastHeardDate;
    public $lastReachedOutToDate;
    public $staffLinkedToMember;

    public function mount($memberId) {
        $this->memberId = $memberId;

        $this->getMemberName();
        $this->getLastHeardDate();
        $this->getLastReachedOutTooDate();
        $this->getNumberOfTimesReachedOutSinceLastHeard();
        $this->checkIfMultipleStaffLinkedToMember();
        $this->checkLastHeardDate();
        $this->checkLastReachedOutTooDate();
        $this->getStaffLinkedToMember();

        $this->checkForIssues();
    }

    private function getMemberName() {
        $memberNames = [1 => '1llusionist#1981', 2 => '1one#1586', 3 => 'à¹–Ì¶Ì¶Ì¶Î¶ÍœÍ¡ GrimmÎ¶ÍœÍ¡à¹–#1817', 4 => 'à¹–Û£ÛœÎ¶Í¡ÍœBraelok#1894'];
        $this->memberName = $memberNames[$this->memberId];

    }

    private function getLastHeardDate() {
        $lastHeardDates = [
            1 => Carbon::now()->subDays(64),
            2 => Carbon::now()->subDays(34),
            3 => Carbon::now()->subDays(3),
            4 => Carbon::now()->subDays(21)
        ];
        $this->lastHeardDate = $lastHeardDates[$this->memberId];
    }

    private function getLastReachedOutTooDate() {
        $lastReachedOutDates = [
            1 => Carbon::now()->subDays(24),
            2 => Carbon::now()->subDays(14),
            3 => Carbon::now()->subDays(36),
            4 => Carbon::now()->subDays(2)
        ];
        $this->lastReachedOutToDate = $lastReachedOutDates[$this->memberId];
    }

    private function getNumberOfTimesReachedOutSinceLastHeard() {
        $timesReachedOut = [
            1 => 1,
            2 => 2,
            3 => 4,
            4 => 7
        ];
        $this->timesReachedOut = $timesReachedOut[$this->memberId];
    }

    private function getStaffLinkedToMember() {
        $linkedStaff = [
            1 => 'Amber, Braelok',
            2 => 'Phylast',
            3 => 'Braelok',
            4 => 'Braelok'
        ];
        $this->staffLinkedToMember = $linkedStaff[$this->memberId];
    }

    private function checkForIssues() {
        $this->hasIssues =  ($this->lastHeardIssue || $this->lastReachedOutTooIssue || $this->multipleStaffLinked);
    }

    private function checkIfMultipleStaffLinkedToMember() {
        $memberLinkCount = [1 => 2, 2 => 1, 3 => 1, 4 => 1];
        $this->multipleStaffLinked = ($memberLinkCount[$this->memberId] > 1);
    }

    private function checkLastHeardDate() {
        $this->lastHeardIssue   = false;
        if($this->lastHeardDate->lt(Carbon::now()->subDays(30))) {
            $this->lastHeardIssue = true;
        }
    }


    private function checkLastReachedOutTooDate() {
        $this->lastReachedOutTooIssue = false;
        if($this->memberId === 3) {
          //  dd($this->lastReachedOutToDate, $this->lastHeardDate, );
        }
        if($this->lastHeardDate->lt($this->lastReachedOutToDate)) {
            if($this->lastReachedOutToDate->lt(Carbon::now()->subDays(30))) {
                $this->lastReachedOutTooIssue = true;
            }
        }
    }


    public function render()
    {
        return view('livewire.member-card');
    }
}
