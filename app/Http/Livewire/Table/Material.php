<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class Material extends Component
{
    public $datanya;
    public function render()
    {
        return view('livewire.table.material',$this->datanya);
    }
}
