<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $iduser = session('id_user');
        $responseData = HttpClient::fetch(
            "GET",
            "https://api-supplychainmeuble.fly.dev/api/user/". $iduser
        );
        $data = $responseData["data"];
        // dd($data,session('id_user'),$iduser);
        return view('dashboard', [
            "data" => $data,
            "page" => 'home'
        ]);
    }
}
