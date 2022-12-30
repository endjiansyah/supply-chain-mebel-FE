<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/barang"
        );
        // dd(session()->get('token'),session('nama'),session('role'));
        $data = $responseData["data"];
        
        // dd($data);
        return view('barang.list', [
            "data" => $data,
            "page" => 'barang'
        ]);
    }

    function detail($id)
    {
        $linknya = "http://localhost:8000/api/barang/" . $id;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $data = $responseData["data"];
        // dd($data);
        return view('barang.detail', [
            "data" => $data,
            "page" => 'barang'
        ]);
    }

    function create()
    {
        return view('barang.create');
    }

    function store(Request $request)
    {
        $payload = [
            "nama_barang" => $request->input("nama_barang"),
            "deskripsi_barang" => $request->input("deskripsi_barang"),
            "id_kategori" => $request->input("kategori"),
            "id_material" => $request->input("material"),
            "panjang" => $request->input("panjang"),
            "lebar" => $request->input("lebar"),
            "tinggi" => $request->input("tinggi"),
        ];

        $file = [
            "gambar" => $request->file('gambar')
        ];

        $barang = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/barang/",
            $payload,
            $file
        );
        // dd($barang,$barang['message'],$payload,$file);

        return redirect()->back()->with(['success' => $barang['message']]);
    }
    function edit($id)
    {
        $linknya = "http://localhost:8000/api/barang/" . $id;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $data = $responseData["data"];

        return view('barang.edit', [
            "data" => $data,
            "page" => 'barang'
        ]);
    }

    function update(Request $request, $id)
    {

        $payload = [
            "nama_barang" => $request->input("nama_barang"),
            "deskripsi_barang" => $request->input("deskripsi_barang"),
            "id_kategori" => $request->input("kategori"),
            "id_material" => $request->input("material"),
            "panjang" => $request->input("panjang"),
            "lebar" => $request->input("lebar"),
            "tinggi" => $request->input("tinggi"),
        ];
        $file = [];

        if ($request->file('gambar')) {
            $file = [
                "gambar" => $request->file('gambar')
            ];
        }
        // dd($file);

        $barang = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/barang/" . $id . "/edit",
            $payload,
            $file
        );

        return redirect()->back()->with(['success' => 'Data terupdate']);
    } // untuk update data

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/barang/" . $id . "/delete",
        );

        return redirect()->back()->with(['success' => 'Data terhapus']);
    } // menghapus data
}
