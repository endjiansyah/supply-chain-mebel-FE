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
            "data" => $data,
            "page" => 'user'
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
            "data" => $data,
            "page" => 'user'
        ]);
    }

    function create()
    {
        return view('user.create',[
            'page' => 'user'
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            "nama" => 'required',
            "email" => 'required|email',
            "role" => 'required|integer',
        ]);
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
            "data" => $data,
            "page" => 'user'
        ]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            "nama" => 'required',
            "email" => 'required|email'
        ]);
        if($request->input("password") != null){
            if($request->input("password") == $request->input("kpassword")){

                $request->validate([
                    "password" => 'min:5',
                ]);

                $payload = [
                    "nama" => $request->input("nama"),
                    "email" => $request->input("email"),
                    "password" => $request->input("password"),
                    "id_role" => $request->input("id_role")
                ];

            }else{
                return redirect()->back()->with(['error' => 'Password dan konfirmasi password tidak cocok']);
            }
        }else{
            $payload = [
                "nama" => $request->input("nama"),
                "email" => $request->input("email")
            ];
        }
        // dd($payload);

        $user = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/user/" . $id . "/edit",
            $payload
        );

        // dd($user);

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
