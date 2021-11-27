<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function login_verify(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $data = $request->input();
        $data['Hashed password'] = Hash::make($data['password']);
        return view('auth.home', compact('data'));
    }

    public function register() {
        return view('auth.register');
    }
}
