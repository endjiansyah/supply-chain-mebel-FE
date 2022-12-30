<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function index()
    {
        $responseData = HttpClient::fetch(
            "GET",
            "http://localhost:8000/api/user"
        );
        $data = $responseData["data"];
        
        // dd($data);
        return view('user.list', [
            "data" => $data
        ]);
    }

    function detail($id)
    {
        $linknya = "http://localhost:8000/api/user/" . $id;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $data = $responseData["data"];

        return view('user.detail', [
            "data" => $data
        ]);
    }

    function create()
    {
        return view('user.create');
    }

    function store(Request $request)
    {
        $payload = [
            "nama" => $request->input("nama"),
            "email" => $request->input("email"),
            "password" => 'hilih',
            "id_role" => $request->input("role"),
            "remember_token" => Str::random(10)
        ];

        $user = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/",
            $payload
        );
        // dd($user,$user['message'],$payload,$file);

        return redirect()->back()->with(['success' => $user['message']]);
    }
    function edit($id)
    {
        $linknya = "http://localhost:8000/api/user/" . $id;
        $responseData = HttpClient::fetch(
            "GET",
            $linknya
        );
        $data = $responseData["data"];

        return view('user.edit', [
            "data" => $data
        ]);
    }

    function update(Request $request, $id)
    {

        $payload = [
            "nama" => $request->input("nama"),
            "email" => $request->input("email"),
            "password" => $request->input("password"),
            "id_role" => $request->input("role")
        ];

        // dd($file);

        $user = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/" . $id . "/edit",
            $payload
        );

        return redirect()->back()->with(['success' => 'Data terupdate']);
    } // untuk update data

    function resetpass($id)
    {
        $payload = [

            "password" => 'hilih'
        ];
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/" . $id . "/edit",
            $payload
        );

        return redirect()->back()->with(['success' => 'Reset Password Berhasil']);
    } // reset password

    function destroy($id)
    {
        HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/" . $id . "/delete",
        );

        return redirect()->back()->with(['success' => 'Data terhapus']);
    } // menghapus data
}
