<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class InputBarang extends Component
{
    public $datanya;
    public $form;
    public function render()
    {
        // dd($this->datanya);
        if($this->datanya == null){
            $this->datanya = [
                'nama_barang' => '',
                'id_kategori' => 0,
                'id_material' => 0,
                'panjang' => '',
                'lebar' => '',
                'tinggi' => '',
                'deskripsi_barang' => '',
                'gambar' => ''
            ];
        }
        return view('livewire.form.input-barang',$this->datanya);
    }
}
