<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class RequireTokenToRegister extends Component
{
    public  $tokenAccepted = false;
    public  $userToken;
    public  $members;
    public $linkedMemberId;
    private  $secretToken = 'lux4ever';



    public function mount()
    {
        $this->members     = Member::all();
    }


    public function checkUserToken()
    {
        if ($this->secretToken === $this->userToken) {
            $this->tokenAccepted = true;
        }
    }


    public function render()
    {
        return view('livewire.require-token-to-register');
    }
}
