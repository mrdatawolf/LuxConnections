<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LinkedLivewireDatatables extends LivewireDatatable
{
    /*public function render()
    {
        return view('livewire.livewire-datatables');
    }*/
    public $model = Member::class;

    public function builder()
    {
        return Member::query()
                     ->select(['members.id','members.name','user_id','members.created_at'])
                     ->leftJoin('users', 'users.id', 'linked_id')
                     ->groupBy('members.id');
    }

    function columns(): array
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->editable()->defaultSort('asc'),
            Column::name('users.name')->label('Supported By'),
            DateColumn::name('created_at'),
            DateColumn::name('updated_at')->hide()
        ];
    }
}
