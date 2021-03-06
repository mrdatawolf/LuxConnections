<?php

namespace App\Http\Livewire;

use App\Models\HeardFrom;
use App\Models\Member;
use App\Models\ReachedOut;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class MemberCard extends Component
{
    public $member;
    public $user;
    public $showConfirmHeardModal = false;
    public $showConfirmReachOutModal = false;
    public $showConfirmBurdenModal = false;
    public $memberId;
    public $memberName;
    public $userAlias;
    public $userHasAlias;
    public $isStaff;
    public $hasIssues;
    public $userLinkIssue;
    public $lastHeardIssue;
    public $lastHeardDate;
    public $lastReachedOutTooIssue;
    public $timesReachedOut;
    public $reachedOutToDates;
    public $lastReachedOutDate;
    public $linkedUserId;
    public $linkedUser;
    public $users;
    public $note;
    public $fullDiscordId;

    public function mount() {
        $this->getMember();
        $this->checkTimestamps();
        $this->checkIsStaff();
        $this->getStaff();
        $this->getLastHeardDate();
        $this->getLastReachedOutDate();
        $this->getUserAlias();
        $this->getLinkedUser();
        $this->getNumberOfTimesReachedOutSinceLastHeard();
        $this->getNotes();
        $this->getFullDiscordId();
        $this->checkLastHeardDate();
        $this->checkLastReachedOutTooDate();
        $this->checkForIssues();
    }

    public function confirmHeard() {
        if(empty($this->lastHeardDate) || $this->lastHeardDate->lt(Carbon::now()->subHours(24))) {
            $this->lastHeardDate = Carbon::now();
            $this->member->heardFrom()->save(new HeardFrom(['member_id' => (int) $this->member->id, 'user_id' => (int) auth()->user()->id]));
            $this->checkLastHeardDate();
        }
        $this->showConfirmHeardModal = false;
        $this->checkForIssues();
    }


    public function confirmReachOut() {
        if(empty($this->lastReachedOutDate) || $this->lastReachedOutDate->lt(Carbon::now()->subHours(24))) {
            $this->lastReachedOutDate = Carbon::now();
            $this->member->reachedOut()->save(new ReachedOut(['member_id' => (int) $this->member->id, 'user_id' => (int) auth()->user()->id]));
            $this->checkLastReachedOutTooDate();
        }
        $this->timesReachedOut++;
        $this->showConfirmReachOutModal = false;
        $this->checkForIssues();
    }

    public function confirmBurden() {
        $this->member->user_id = auth()->user()->id;
        $this->member->save();
        $this->emit('staffLinked');
        $this->isStaff = true;
        $this->showConfirmBurdenModal = false;
        $this->emit('aliasUpdated');
    }


    public function linkMemberToUser() {
        if(empty($this->linkedUserId)) {
            $this->linkedUser         = null;
            $this->userLinkIssue     = true;
            $this->member->linked_id = null;
            $this->emit('memberUserLinkUpdated', 0, $this->memberId);
        } else {
            $this->linkedUser         = User::find($this->linkedUserId);
            $this->userLinkIssue     = false;
            $this->member->linked_id = $this->linkedUserId;
            $this->member->save();
            $this->emit('memberUserLinkUpdated', (int)$this->linkedUserId, $this->memberId);
        }
        $this->checkForIssues();
    }

    public function changeFullDiscordId() {
        $this->member->full_discord_id = $this->fullDiscordId;
        $this->member->save();
    }

    public function changeNotes() {
        $this->member->notes = $this->note;
        $this->member->save();
    }

    public function getLinkedUser() {
        if(! empty($this->member->linked_id)) {
            $this->linkedUser         = User::find($this->member->linked_id);
            $this->linkedUserId       = $this->member->linked_id;
        } else {
            $this->userLinkIssue     = true;
        }
    }


    private function getStaff() {
        $this->users = User::where('id','!=',1)->get();
    }

    private function getUserAlias() {
        $this->userAlias    = User::find($this->member->user_id);
    }

    private function getMember() {
        $this->member = Member::with('users','heardFrom','reachedOut', 'alias')->find($this->memberId);
        $this->memberName = $this->member->name;
        $this->userAlias = User::find($this->member->user_id);
    }

    private function getLastHeardDate() {
        $lastHeardDates = HeardFrom::where('member_id', $this->member->id)->orderBy('created_at')->get();
        if($lastHeardDates->isNotEmpty()) {
            $this->lastHeardDate = $lastHeardDates->last()->created_at;
        }
    }

    private function getLastReachedOutDate() {
        $lastReachedOutDates = ReachedOut::where('member_id', $this->member->id)->orderBy('created_at')->get();
        if($lastReachedOutDates->isNotEmpty()) {
            $this->lastReachedOutDate = $lastReachedOutDates->last()->created_at;
        }
    }

    private function getNumberOfTimesReachedOutSinceLastHeard() {
        $this->reachedOutToDates = $this->member->reachedOut;
        $this->timesReachedOut = ($this->member->reachedOut->isEmpty()) ? 0
        :
        $this->reachedOutToDates->where('created_at', '>', $this->lastHeardDate)->count();
    }

    private function getNotes() {
        $this->note = $this->member->notes;
    }
    private function getFullDiscordId() {
        $this->fullDiscordId = $this->member->full_discord_id;
    }

    private function checkForIssues() {
        $this->hasIssues =  ($this->lastHeardIssue || $this->lastReachedOutTooIssue || $this->userLinkIssue);
    }


    private function checkTimestamps() {
        if(empty($this->member->created_at)) {
            $this->member->created_at = Carbon::now();
        }
        if(empty($this->member->updated_at)) {
            $this->member->updated_at = Carbon::now();
        }
        $this->member->save();
    }

    private function checkLastHeardDate() {
        $this->lastHeardIssue   = false;
        if(empty($this->lastHeardDate)) {
            if($this->member->created_at->lt(Carbon::now()->subDays(30))) {
                $this->lastHeardIssue = true;
            }
        }
    }


    private function checkLastReachedOutTooDate() {
        $this->lastReachedOutTooIssue = false;
        if(empty($this->lastReachedOutDate)) {
            if($this->member->created_at->lt(Carbon::now()->subDays(30))) {
                $this->lastReachedOutTooIssue = true;
            }
        } elseif(empty($this->lastHeardDate) || $this->lastHeardDate->lt($this->lastReachedOutDate)) {
            if($this->lastReachedOutDate->lt(Carbon::now()->subDays(30))) {
                $this->lastReachedOutTooIssue = true;
            }
        }
    }

    private function checkIsStaff() {
        if(!empty($this->member->alias) && $this->member->alias->id === 1) {
            $this->isStaff = false;
        } else {
            $this->isStaff = $this->member->isStaff();
        }
    }


    public function render()
    {
        return view('livewire.member-card');
    }
}
