<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class MemberCard extends Component
{
    public $showConfirmHeardModal = false;
    public $showConfirmReachOutModal = false;
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
    public $staffNamesLinkedToMember;
    public $linkedStaffMemberId; //this is the first staff id linked to member... it may not be the "best" one.
    public $staffMembers;

    public function mount($memberId) {
        $this->memberId = $memberId;

        $this->getMemberName();
        $this->getLastHeardDate();
        $this->getLastReachedOutTooDate();
        $this->getStaffMembers();
        $this->getStaffLinkedToMember();
        $this->getNumberOfTimesReachedOutSinceLastHeard();
        $this->checkIfMultipleStaffLinkedToMember();
        $this->checkLastHeardDate();
        $this->checkLastReachedOutTooDate();


        $this->checkForIssues();
    }

    public function confirmHeard() {
        if($this->lastHeardDate->lt(Carbon::now()->subHours(24))) {
            $this->lastHeardDate = Carbon::now();
            $this->checkLastHeardDate();
        }
        $this->showConfirmHeardModal = false;
    }


    public function confirmReachOut() {
        if($this->lastReachedOutToDate->lt(Carbon::now()->subHours(24))) {
            $this->lastReachedOutToDate = Carbon::now();
            $this->checkLastReachedOutTooDate();
        }
        $this->timesReachedOut++;
        $this->showConfirmReachOutModal = false;
    }


    public function updateLinkedStaffMember() {
        $this->staffLinkedToMember = [(int) $this->linkedStaffMemberId];
        $this->staffNamesLinkedToMember = $this->staffMembers[(int) $this->linkedStaffMemberId];
        $this->emit('memberStaffLinkUpdated', (int) $this->linkedStaffMemberId, $this->memberId);
    }


    private function getStaffMembers() {
        $staffNames = [1 => 'Phylast', 2 => 'Ambear', 3 => 'Braelok'];
        $this->staffMembers = $staffNames;
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
            1 => Carbon::now()->subDays(60),
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
            1 => [2, 3],
            2 => [1],
            3 => [2],
            4 => [2]
        ];
        $this->staffLinkedToMember = $linkedStaff[$this->memberId];
        $first = true;
        foreach($this->staffLinkedToMember as $staffId) {
            if($first) {
                $first = false;
            } else {
                $this->staffNamesLinkedToMember .= ', ';
            }
            $this->staffNamesLinkedToMember .= $this->staffMembers[$staffId];
        }
        $this->linkedStaffMemberId = $linkedStaff[$this->memberId][0];
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
