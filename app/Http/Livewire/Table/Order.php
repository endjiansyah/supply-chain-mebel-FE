<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class Order extends Component
{
    public $datanya;
    public function render()
    {
        return view('livewire.table.order',$this->datanya);
    }
}
