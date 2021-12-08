<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
//    public function username()
//    {
//        return 'username';
//    }

    public function login() {
        if (Auth::user()) {
           return redirect()->route('home');
        }
        else {
            return view('auth.login');
        }
    }

    public function login_verify(Request $request) {
        $input = $request->all();
        $validatedData = $request->validate([
            'username' => 'required | string | max:255',
            'password' => 'required | string | min:3',
        ]);
        $user_remember = $request['remember'];
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $userData = array($fieldType => $input['username'], 'password' => $input['password']);
        Auth::attempt($userData, $user_remember);
        return redirect()->route('home')->with('User_Dropdown', Auth::user())->withErrors($validatedData);
    }

    public function register() {
        return view('auth.register');
    }

    public function register_verify(Request $request) {

        $validatedData = $request->validate([
            'username'              => ['required', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('login')->withInput($request->all());
    }

    public function home() {
        if (Auth::user()) {
            return view('auth.home')->with('User_Dropdown', Auth::user());
        }
        else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
//        return Redirect::to('login'); // redirect the user to the login screen
        return redirect()->route('login');
    }
}
