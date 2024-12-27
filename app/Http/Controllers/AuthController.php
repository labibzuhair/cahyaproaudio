<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registration()
    {
        return view('layouts/auth/registration');
    }

    public function registration_post(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'is_role' => 'required',
        ]);

        // Create a new User instance and populate it with validated data
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->is_role = trim($request->is_role);
        $user->remember_token = Str::random(50);
        $user->save();

        // Redirect to login with success message
        return redirect('login')->with('success', 'Registration successful');
    }
    public function login_post(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->is_role == 'admin') {
                echo "Admin";
                die();
                // return redirect()->intended('layouts.admin.beranda.beranda');
            } else if (Auth::User()->is_role == 'owner') {
                echo "owner";
                die();
                // return redirect()->intended('layouts.owner.beranda.beranda');
            } else if (Auth::User()->is_role == 'customer') {
                echo "customer";
                die();
                // return redirect()->intended('layouts.main.beranda.beranda');
            } else {
                return redirect('login')->with('error', 'please enter the correct credentials');
            }
        } else {
            return redirect()->back()->with('error', 'please enter the correct ');
        }
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
