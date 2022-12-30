<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class User extends Component
{
    public $datanya;
    public function render()
    {
        return view('livewire.table.user',$this->datanya);
    }
}
