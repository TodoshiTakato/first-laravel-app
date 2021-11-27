<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('auth.home', compact('data'));
    }

    public function register() {
        return view('auth.register');
    }
}
