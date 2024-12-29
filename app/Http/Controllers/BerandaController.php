<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('layouts.main.beranda.beranda');
    }
    public function beranda()
    {
        if (Auth::user()->is_role == 'admin') {
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('layouts.admin.beranda.beranda', $data);
        } else if (Auth::user()->is_role == 'owner') {
            return view('layouts.owner.beranda.beranda');
        } else if (Auth::user()->is_role == 'customer') {
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('layouts.main.beranda.beranda');
        }

    }

}
