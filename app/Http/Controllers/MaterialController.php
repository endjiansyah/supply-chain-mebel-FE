<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    function store(Request $request)
    {
        $payload = [
            "nama_material" => $request->input("nama_material"),
            "keterangan" => $request->input("keterangan"),
        ];

        $material = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/material/",
            $payload
        );

        return redirect()->back()->with(['success' => $material['message']]);
    }

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/material/" . $id . "/delete",
        );

        return redirect()->back()->with(['success' => 'Data terhapus']);
    } // menghapus data
}
