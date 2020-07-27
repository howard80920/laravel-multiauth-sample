<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function infos(Request $request)
    {
        return response([
            'host' => $request->getHost(),
        ]);
    }
    
}