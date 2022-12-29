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
        
        // dd($data);
        return view('barang.list', [
            "data" => $data
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

        return view('barang.detail', [
            "data" => $data
        ]);
    }

    function create()
    {
        return view('barang.create');
    }
}
