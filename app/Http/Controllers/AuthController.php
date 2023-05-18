<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::check()){
                return redirect()->intended('/');
            }
            return back()->withErrors([
                'auth' => 'Auth Gagal'
            ]);
        }
        return back()->withErrors([
            'username' => 'username salah',
            'password' => 'password salah',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'username' => 'required|string|unique|max:50',
            'name' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'password' => 'required|string|max:50'
        ]);
    }
}
