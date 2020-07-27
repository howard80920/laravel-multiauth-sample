<?php

namespace App\Http\Controllers;

class RootController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
}