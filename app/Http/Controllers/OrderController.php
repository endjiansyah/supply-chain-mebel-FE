<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/order"
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('order.list', [
            "data" => $data,
            "page" => 'order'
        ]);
    }

    function detail($id)
    {
        $linknya = "http://localhost:8000/api/order/" . $id;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $data = $responseData["data"];
        
        if($responseData['status'] == false){
            return redirect()->route('order.index');
        }

        // -------------------batas suci------------------
        $barang = $data['id_barang'];
        $linknya = "http://localhost:8000/api/barang/" . $barang;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $barang = $responseData["data"];
        
        return view('order.detail', [
            "data" => $data,
            "barang" => $barang,
            "page" => 'order'
        ]);
    }
    
    function store(Request $request)
    {
        $request->validate([
            'barang' => 'required'
        ]);
        $payload = [
            "id_barang" => $request->input("barang"),
            "id_user" => session('id_user'),
        ];

        $order = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/order/",
            $payload
        );
        // dd($order,$order['message'],$payload,$file);

        return redirect()->back()->with(['success' => $order['message']]);
    }
    

    function update(Request $request, $id)
    {
        if(!$request->input("status") && !$request->input("deskripsi")){
            return redirect()->back()->with(['error' => 'Tidak ada perubahan apapun']);
        }
        
        $file = [];

        if ($request->file('attachment')) {

            $request->validate([
                'attachment' => 'mimes:jpg,jpeg,png,pdf'
            ]);

            $file = [
                "attachment" => $request->file('attachment')
            ];
            
        }

        $request->validate([
            'deskripsi' => 'max:255'
        ]);

        $payload = [
            "status" => $request->input("status"),
            "id_user" => session('id_user'),
        ];
        // dd($payload);

        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/order/" . $id . "/edit",
            $payload
        );

        // --------- {batas suci} ----------
        $payloadlog = [
            "id_order" => $id,
            "status" => $request->input("status"),
            "deskripsi" => $request->input("deskripsi"),
            "id_user" => session('id_user'),
        ];

        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/log/",
            $payloadlog,
            $file
        );
        // --------- {batas suci} ----------

        return redirect()->back()->with(['success' => 'Status berhasil diubah']);
    } // untuk update data
}
