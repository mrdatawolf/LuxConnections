<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequireTokenToRegister extends Component
{
    public $tokenAccepted = false;
    public $userToken;
    private $secretToken = 'lux4ever';

    public function checkUserToken() {
        if($this->secretToken === $this->userToken) {
            $this->tokenAccepted = true;
        }
    }
    public function render()
    {
        return view('livewire.require-token-to-register');
    }
}
