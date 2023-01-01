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
        $data = $responseData["data"];

        $responseData = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/kategori"
        );
        $kategori = $responseData["data"];

        $responseData = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/material"
        );
        $material = $responseData["data"];
        
        // dd($data);
        return view('barang.list', [
            "data" => $data,
            "kategori" => $kategori,
            "material" => $material,
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
        return view('barang.create',[
        "page" => 'barang'
    ]);
    }

    function store(Request $request)
    {
        $request->validate([
            "nama_barang" => 'required',
            "id_kategori" => 'required|integer',
            "id_material" => 'required|integer',
            "panjang" => 'required|integer',
            "lebar" => 'required|integer',
            "tinggi" => 'required|integer',
            "gambar" => 'required|mimes:jpg,jpeg,png',
        ]);
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
        $request->validate([
            "nama_barang" => 'required',
            "id_kategori" => 'required|integer',
            "id_material" => 'required|integer',
            "panjang" => 'required|integer',
            "lebar" => 'required|integer',
            "tinggi" => 'required|integer'
        ]);
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
            $request->validate([
                "gambar" => 'mimes:jpg,jpeg,png',
            ]); 
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
