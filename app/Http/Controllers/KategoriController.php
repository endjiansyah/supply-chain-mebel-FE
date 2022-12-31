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
            "http://localhost:8000/api/kategori/",
            $payload
        );

        return redirect()->back()->with(['success' => $kategori['message']]);
    }

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/kategori/" . $id . "/delete",
        );

        return redirect()->back()->with(['success' => 'Data terhapus']);
    } // menghapus data
}
