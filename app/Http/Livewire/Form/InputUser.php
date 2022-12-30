<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class InputUser extends Component
{
    public $datanya;
    public function render()
    {
        if($this->datanya == null){
            $this->datanya = [
                'nama' => '',
                'id_role' => 0,
                'email' => '',
            ];
        }
        return view('livewire.form.input-user',$this->datanya);
    }
}
