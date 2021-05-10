<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StaffLivewireDatatables extends LivewireDatatable
{
    /*public function render()
    {
        return view('livewire.livewire-datatables');
    }*/
    public $model = User::class;
    function columns(): array
    {
        return [
            NumberColumn::name('id')->linkTo('staff-member'),
            Column::name('name')->defaultSort('asc')->editable(),
            Column::name('email')->editable(),
            DateColumn::name('created_at')
        ];
    }
}
