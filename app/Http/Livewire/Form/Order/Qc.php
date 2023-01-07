<?php

namespace App\Http\Livewire\Form\Order;

use App\Helpers\HttpClient;
use Livewire\Component;

class Qc extends Component
{
    public $status;
    public $id_order;
    public function render()
    {
        $data = HttpClient::fetch(
            "GET",
            "https://api-supplychainmeuble.fly.dev/api/status/"
        );
        $datane = $data["data"];
        // dd($datane);
        // dd($this->id_order);
        return view('livewire.form.order.qc',[
            'datane' => $datane,
            'status' => $this->status,
            'id_order' => $this->id_order
        ]);
    }
}
