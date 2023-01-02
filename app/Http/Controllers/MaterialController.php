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

        return redirect()->back()->with(['successmtr' => $material['message']]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            "nama_material" => 'required',
            "keterangan" => 'required'
        ]);
        $payload = [
            "nama_material" => $request->input("nama_material"),
            "keterangan" => $request->input("keterangan")
        ];

        $material = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/material/" . $id . "/edit",
            $payload
        );

        return redirect()->back()->with(['successmtr' => 'Data terupdate']);
    }

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/material/" . $id . "/delete",
        );

        return redirect()->back()->with(['successdmtr' => 'Data terhapus']);
    } // menghapus data
}
