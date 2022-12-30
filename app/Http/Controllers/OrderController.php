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
            "data" => $data
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

        return view('order.detail', [
            "data" => $data
        ]);
    }

    // function create()
    // {
    //     return view('order.create');
    // }

    // function store(Request $request)
    // {
    //     $payload = [
    //         "nama_order" => $request->input("nama_order"),
    //         "deskripsi_order" => $request->input("deskripsi_order"),
    //         "id_kategori" => $request->input("kategori"),
    //         "id_material" => $request->input("material"),
    //         "panjang" => $request->input("panjang"),
    //         "lebar" => $request->input("lebar"),
    //         "tinggi" => $request->input("tinggi"),
    //     ];

    //     $file = [
    //         "gambar" => $request->file('gambar')
    //     ];

    //     $order = HttpClient::fetch(
    //         "POST",
    //         "http://localhost:8000/api/order/",
    //         $payload,
    //         $file
    //     );
    //     // dd($order,$order['message'],$payload,$file);

    //     return redirect()->back()->with(['success' => $order['message']]);
    // }
    // function edit($id)
    // {
    //     $linknya = "http://localhost:8000/api/order/" . $id;
    //     $responseData = HttpClient::fetch(
    //         "GET",
    //         $linknya
    //     );
    //     $data = $responseData["data"];

    //     return view('order.edit', [
    //         "data" => $data
    //     ]);
    // }

    // function update(Request $request, $id)
    // {

    //     $payload = [
    //         "nama_order" => $request->input("nama_order"),
    //         "deskripsi_order" => $request->input("deskripsi_order"),
    //         "id_kategori" => $request->input("kategori"),
    //         "id_material" => $request->input("material"),
    //         "panjang" => $request->input("panjang"),
    //         "lebar" => $request->input("lebar"),
    //         "tinggi" => $request->input("tinggi"),
    //     ];
    //     $file = [];

    //     if ($request->file('gambar')) {
    //         $file = [
    //             "gambar" => $request->file('gambar')
    //         ];
    //     }
    //     // dd($file);

    //     $order = HttpClient::fetch(
    //         "POST",
    //         "http://localhost:8000/api/order/" . $id . "/edit",
    //         $payload,
    //         $file
    //     );

    //     return redirect()->back()->with(['success' => 'Data terupdate']);
    // } // untuk update data

    // function destroy($id)
    // {
    //     HttpClient::fetch(
    //         "POST",
    //         "http://localhost:8000/api/order/" . $id . "/delete",
    //     );

    //     return redirect()->back()->with(['success' => 'Data terhapus']);
    // } // menghapus data
}
