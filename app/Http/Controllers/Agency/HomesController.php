<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{

    public function welcome()
    {
        return response('welcome agency');
    }

    public function main()
    {
        return response([
            'user' => Auth::user()
        ]);
    }

    public function info()
    {
        $user = Auth::user();
        return response([
            'email'    => $user->email,
            'username' => $user->name,
        ]);
    }

}