<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateStaff extends Component
{
    public function addStaff() {
        dd('add staff');
    }
    public function render()
    {
        return view('livewire.create-staff');
    }
}
