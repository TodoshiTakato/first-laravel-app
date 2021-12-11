<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function login() {
        if (Auth::user()) {
           return redirect()->route('home');
        }
        else {
            return view('auth.login');
        }
    }

    public function login_verify(LoginRequest $request) {
        $validatedData = $request->validated();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $userData = array($fieldType => $validatedData['username'], 'password' => $validatedData['password']);
        if(isset($validatedData['remember'])) {
            $user_remember = $validatedData['remember'];
        }
        else {
            $user_remember = null;
        }

        if (Auth::attempt($userData, $user_remember)) {
            // Authentication passed...
            return redirect()->route('home');
        }
        else {
            return redirect()
                ->route('login')
                ->withErrors([
                    'error_message'=>'Неверные аутентификационные данные',
                ]);
        }

    }

    public function register() {
        return view('auth.register');
    }

    public function register_verify(RegisterRequest $request) {

        $validatedData = $request->validated();

        if (User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $request['email'],
                'password' => Hash::make($validatedData['password']),
            ])
        ) { return redirect()->route('login')->withInput($validatedData); }
        else { return redirect()->route('register')->withInput($validatedData)->withErrors($validatedData); }
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
