<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function test()
    {
        return response('test front!!');
    }

    public function login(Request $request)
    {
        
        $attempt = Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ]);
        if (!$attempt) {
            return response([
                'errors' => [
                    'msg' => 'login error'
                ]
            ], 422);
        }
        return response([
            'message' => 'ok'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response([ 'message' => 'logout success' ]);
    }

}