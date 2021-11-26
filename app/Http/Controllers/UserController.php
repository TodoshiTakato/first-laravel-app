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
            'username'=>'required | max:10',
            'password'=>'required | min:5'
        ]);
        $data = $request->input();
        return view('auth.home', compact('data'));
    }

    public function register() {
        return view('auth.register');
    }
}
