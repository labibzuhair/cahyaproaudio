<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration()
    {
        return view('layouts/auth/registration');
    }
    public function registration_post(Request $request)
    {
        dd($request->all());
    }
    public function login()
    {
        return view('layouts/auth/login');
    }
    public function forgot()
    {
        return view('layouts/auth/forgot');
    }
}
