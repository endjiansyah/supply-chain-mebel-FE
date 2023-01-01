<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class Kategori extends Component
{ 
    public $datanya;

    public function render()
    {
        return view('livewire.table.kategori',['datanya' => $this->datanya]);
    }
}
