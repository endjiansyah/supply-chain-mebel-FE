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

        $payload = [
            "status" => $request->input("status"),
            "id_user" => session('id_user'),
        ];
        // dd($payload);
        $file = [];

        if ($request->file('attachment')) {
            $file = [
                "attachment" => $request->file('attachment')
            ];
        }
        // dd($file);

        $order = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/order/" . $id . "/edit",
            $payload,
            $file
        );
        // dd($order);

        return redirect()->back()->with(['success' => $order['message']]);
    } // untuk update data
}
