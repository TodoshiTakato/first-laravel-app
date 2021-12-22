<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use GuzzleHttp\Client;
use Mail;
use App\Mail\EmailVerificationMail;
use App\Mail\ForgetPasswordMail;
use App\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function getRegister() {  // Checked
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request){  // Checked
        $validatedData = $request->validated();
        $grecaptcha=$request->grecaptcha;
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                    'response'=>$grecaptcha
                ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        if($body->success==true){
            if (
            $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->username, // TODO add to frontend
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'email_verification_code'=>Str::random(40) // TODO know what is that
            ])
            ) {
                return redirect()->route('login')->withInput($validatedData);
                Mail::to($request->email)->send(new EmailVerificationMail($user));
                return redirect()->back()->with(
                    'success',
                    'Registration successfull. Please check your email address for email verification link.'
                );
            } else {
                return redirect()->route('register')->withInput($validatedData)->withErrors($validatedData);
            }
        } else {
            return redirect()->back()->with('error','Invalid recaptcha');
        }
    }

    public function ajaxRegister(RegisterRequest $request){  // Checked
        $validatedData = $request->validated();
        $grecaptcha    = $request->grecaptcha;
        $client        = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                    'response'=>$grecaptcha
                ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        if($body->success==true){
            $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'email_verification_code'=>Str::random(40)
            ]);
            Mail::to($request->email)->send(new EmailVerificationMail($user));
            return response()->json([
                "message"=>"Registration successfull. Please check your email address for email verification link.",
                "redirect_url"=>route('getLogin')
            ],200);
        } else {
            return response()->json([
                "message"=>"Invalid recaptcha"
            ],400);
        }
    }

    public function getLogin() {  // Checked
        if (Auth::user()) {
            return redirect()->route('home');
        }
        else {
            return view('auth.login');
        }
    }

    public function postLogin(LoginRequest $request){  // Checked
        $grecaptcha = $request->grecaptcha;
        $fieldType  = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $userData   = array($fieldType => $request->username, 'password' => $request->password);
        $client     = new Client();

        $response   = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                    'response'=>$grecaptcha
                ]
            ]
        );

        $body       = json_decode((string)$response->getBody());

        if($body->success==true){
            $user=User::where('email',$request->email)->first();
            if(!$user){
                return redirect()->back()->with('error','Email is not registered');
            } else {
                if(!$user->email_verified_at){
                    return redirect()->back()->with('error','Email is not verified');
                } else {
                    if(!$user->is_active){
                        return redirect()->back()->with('error','User is not active. Contact admin');
                    } else {
                        $remember_me = ( $request->remember_me ) ? true : false;
                        if (
                            auth()->attempt($userData, $remember_me)
                        ) {
                            if (session('url.intended')) {
                                return redirect(session()->pull('url.intended'));
                            }
                            return redirect()->route('home')->with('success', 'Login successfull');
                        } else {
                            return redirect()
                                ->route('login')
                                ->withErrors(['error_message'=>'Неверные аутентификационные данные'])
                                ->with('error', 'Invalid credentials');
                        }
                    }
                }
            }
        } else {
            return redirect()->back()->with('error','Invalid recaptcha');
        }
    }

    public function ajaxLogin(LoginRequest $request){  // Checked
        $grecaptcha = $request->grecaptcha;
        $client     = new Client();

        $response   = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('GOOGLE_CAPTCHA_SECRET'),
                    'response'=>$grecaptcha
                ]
            ]
        );

        $body = json_decode( (string)$response->getBody() );

        if ($body->success == true) {
            $user=User::where('email', $request->email)->first();
            if(!$user){
                return response()->json([
                    'message'=>'Email is not registered'
                ], 400);
            } else {
                if(!$user->email_verified_at){
                    return response()->json([
                        'message'=>'Email is not verified'
                    ], 400);
                } else {
                    if(!$user->is_active){
                        return response()->json([
                            'message' => 'User is not active. Contact admin'
                        ], 400);
                    } else {
                        $remember_me = ( $request->remember_me ) ? true : false;
                        if(auth()->attempt($request->only('email','password'),$remember_me)){
                            return response()->json([
                                'message'=>'Login successfull',
                                'redirect_url'=>route('dashboard')
                            ],200);
                        } else {
                            return response()->json([
                                'message'=>'Invalid credentials'
                            ],400);
                        }
                    }
                }
            }
        } else {
            return response()->json([
                'message'=>'Invalid recaptcha'
            ],400);
        }
    }

    public function getForgetPassword(){
        return view('auth.forget_password');
    }

    public function postForgetPassword(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('error','User not found.');
        }else{
            $reset_code=Str::random(200);
            PasswordReset::create([
                'user_id'=>$user->id,
                'reset_code'=>$reset_code
            ]);
            Mail::to($user->email)->send(new ForgetPasswordMail($user->first_name, $reset_code));
            return redirect()
                ->back()
                ->with('success','We have sent you a password reset link. Please check your email.');
        }
    }

    public function getResetPassword($reset_code){
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at){
            return redirect()
                ->route('getForgetPassword')
                ->with('error','Invalid password reset link or link expired.');
        }else{
            return view('auth.reset_password',compact('reset_code'));
        }
    }

    public function postResetPassword($reset_code, Request $request){
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(10)> $password_reset_data->created_at){
            return redirect()->route('getForgetPassword')->with('error','Invalid password reset link or link expired.');
        }else{
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:6|max:100',
                'confirm_password'=>'required|same:password',
            ]);
            $user=User::find($password_reset_data->user_id);
            if($user->email != $request->email){
                return redirect()->back()->with('error','Enter correct email.');
            } else {
                $password_reset_data->delete();
                $user->update([
                    'password'=>Hash::make($request->password)
                ]);
                return redirect()->route('getLogin')->with('success','Password successfully reset. ');
            }
        }
    }

    public function check_email_unique(Request $request){
        $user=User::where('email',$request->email)->first();
        if($user){
            echo 'false';
        }else{
            echo 'true';
        }
    }

    public function verify_email($verification_code){
        $user = User::where('email_verification_code',$verification_code)->first();
        if(!$user){
            return redirect()->route('getRegister')->with('error', 'Invalid URL');
        } else {
            if($user->email_verified_at){
                return redirect()->route('getRegister')->with('error', 'Email already verified');
            } else {
                $user->update([
                    'email_verified_at'=>\Carbon\Carbon::now()
                ]);
                return redirect()->route('getRegister')->with('success', 'Email successfully verified');
            }
        }
    }

    public function home() {  // Checked
        if (Auth::user()) {
            return view('auth.home');
        }
        else {
            return redirect()->route('getLogin');
        }
    }

    public function logout(){  // Checked
        Auth::logout();
        return redirect()->route('getLogin')->with('success','Logout successfull');
    }
}
