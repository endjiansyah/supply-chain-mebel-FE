<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TableBarang extends Component
{
    public $datanya;
    
    public function render()
    {
        // $data = ['datanya' => $this->datanya];
        return view('livewire.table-barang',$this->datanya);
    }
}
