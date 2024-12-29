<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('layouts.main.beranda.beranda', compact('produks'));
    }
    public function beranda()
    {
        $user = Auth::user();
        $data['getRecord'] = User::find($user->id);
        $data['produks'] = Produk::all();
        if ($user->is_role == 'admin') {
            return view('layouts.admin.beranda.beranda', $data);
        } elseif ($user->is_role == 'owner') {
            return view('layouts.owner.beranda.beranda', $data);
        } elseif ($user->is_role == 'customer') {
            return view('layouts.main.beranda.beranda', $data);
        }

    }

}
