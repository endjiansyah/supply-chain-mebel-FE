<?php

namespace App\Http\Livewire\Form\Order;

use App\Helpers\HttpClient;
use Livewire\Component;

class Qc extends Component
{
    public $status;
    public function render()
    {
        $data = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/status/"
        );
        $datane = $data["data"];
        // dd($datane);
        return view('livewire.form.order.qc',['datane' => $datane , 'status' => $this->status]);
    }
}
