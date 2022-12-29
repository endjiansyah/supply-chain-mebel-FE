<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;

class Detail extends Component
{
    public $datanya;
    public function render()
    {
        return view('livewire.data.detail',$this->datanya);
    }
}
