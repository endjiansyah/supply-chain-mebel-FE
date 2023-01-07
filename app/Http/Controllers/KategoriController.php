<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function store(Request $request)
    {
        $payload = [
            "nama_kategori" => $request->input("nama_kategori"),
            "kode" => $request->input("kode"),
        ];

        $kategori = HttpClient::fetch(
            "POST",
            "https://api-supplychainmeuble.fly.dev/api/kategori/",
            $payload
        );

        return redirect()->back()->with(['successktg' => $kategori['message']]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            "nama_kategori" => 'required',
            "kode" => 'required'
        ]);
        $payload = [
            "nama_kategori" => $request->input("nama_kategori"),
            "kode" => $request->input("kode")
        ];

        $barang = HttpClient::fetch(
            "POST",
            "https://api-supplychainmeuble.fly.dev/api/kategori/" . $id . "/edit",
            $payload
        );

        return redirect()->back()->with(['successktg' => 'Data terupdate']);
    }
    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "https://api-supplychainmeuble.fly.dev/api/kategori/" . $id . "/delete",
        );
        return redirect()->back()->with(['successdktg' => 'Data terhapus']);
    } // menghapus data
}