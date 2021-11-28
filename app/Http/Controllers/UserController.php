<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
//    public function username()
//    {
//        return 'username';
//    }

    public function login() {
        if (Auth::user()) {
            redirect()->route('home');
        }
        else {
            return view('auth.login');
        }
    }

    public function login_verify(Request $request) {
//        $request->validate([
//            'username'=>'required',
//            'password'=>'required'
//        ]);
//        $data = $request->input();
//        $data['Hashed password'] = Hash::make($data['password']);
//        return view('auth.home', compact('data'));
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required | string',
            'password' => 'required | min:3',
//            'password' => 'required | alpha_num | min:3',
        ]);

//        $x = expr1 ? expr2 : expr3   Returns the value of $x.
//        The value of $x is expr2 if expr1 = TRUE.
//        The value of $x is expr3 if expr1 = FALSE
//        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $fieldType = 'username';
        $userData = array($fieldType => $input['username'], 'password' => $input['password']);
        if (auth()->attempt($userData))
        {
            return redirect()->route('home');
        }
        else {
//            return back()->with('error', 'Wrong Login Details');
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function home() {
        return view('auth.home');
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
//        return Redirect::to('login'); // redirect the user to the login screen
        return redirect()->route('login');
    }
}
