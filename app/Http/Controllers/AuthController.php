<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        session()->flush();
        return redirect("/");
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $payload = [
            'email' => $email,
            'password' => $password,
        ];

        $auth = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/login",
            $payload,
        );

        if (!session()->isStarted()) {
            session()->start();
        }

        if ($auth['status'] == false) {
            return redirect('/')->with('error', $auth['message']);
        }

        $token = $auth['data']['auth']['token'];

        $token_type = $auth['data']['auth']['token_type'];
        session()->put("token", "$token_type $token");
        session()->put("role", $auth['data']['user']['id_role']);
        session()->put("nama", $auth['data']['user']['nama']);

        dd(session('nama'));

            return redirect('/barang')->with('success', 'berhasil login');
        
    }
}
