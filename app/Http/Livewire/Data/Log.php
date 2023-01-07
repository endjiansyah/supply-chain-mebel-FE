<?php

namespace App\Http\Livewire\Data;

use App\Helpers\HttpClient;
use Livewire\Component;

class Log extends Component
{
    public $id_order;
    public function render()
    {
        $linknya = "https://api-supplychainmeuble.fly.dev/api/log/" . $this->id_order;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $datanya = $responseData["data"];
        // dd($datanya);
        return view('livewire.data.log',['datanya' => $datanya]);
    }
}
