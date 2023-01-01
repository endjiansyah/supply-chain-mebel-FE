<?php

namespace App\Http\Livewire\Form\Order;

use App\Helpers\HttpClient;
use Livewire\Component;

class Gudang extends Component
{
    public $status;
    public $id_order;
    public function render()
    {
        $data = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/status/"
        );
        $datane = $data["data"];
        // dd($datane);
        return view('livewire.form.order.gudang',[
            'datane' => $datane,
            'status' => $this->status,
            'id_order' => $this->id_order
        ]);
    }
}
