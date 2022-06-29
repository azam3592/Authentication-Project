<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = $request->validate(
            [
                'first_name' => 'required|string|min:3|max:255',
                'last_name' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6|max:255',
            ],
            [
                'first_name.required' => "*First Name is required",
                'last_name.required' => "*Last Name is required",
                'email.required' => "*Email is required",
                'password.required' => "*Password is required",
            ]
        );
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $HashPassword = Hash::make($password);
        $users_count = User::where('email', '=', $email)
            ->count();
        if ($users_count > 0) {
            return back()->with('failed', "Email already Exist");
        } else {
            if ($password == $cpassword) {
                if ($password != '') {
                    User::insert([
                        'first_name'=>$first_name,
                        'last_name'=>$last_name,
                        'email'=>$email,
                        'password'=>$HashPassword,
                    ]);
                    return redirect('/')->with('success', 'Login Here');
                }
            } else {
                return back()->with('failed', "Password Not Matched");
            }
        }
    }
    public function login(Request $request){
            $request->validate(
                [
                    'email' => 'required|string|email|max:255',
                    'password' => 'required|string|min:6|max:255',
                ],
                [
                    'email.required' => "*Email is required",
                    'password.required' => "*Password is required",
                ]
            );
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $User = User::where('email', '=', $request->input('email'))->first();
            $first_name = $User->first_name;
            $last_name = $User->last_name;
            $email = $User->email;
            if ($User === null) {
                return back()->with('failed', "Email doesn't Exist");
            } else if (!Hash::check($password, $User->password) && ($password != $User->password)) {
                return back()->with('failed', "Login Fail, pls check password")->with('email', $email);
            } else {
                if ($request->has('RememberMe')) {
                    $EmailCookie =  Cookie::make('emailcookie', $email, time() + 86400);
                    $PasswordCookie = Cookie::make('passwordcookie', $password, time() + 86400);
                    $request->session()->put('first_name', $first_name);
                    $request->session()->put('last_name', $last_name);
                    $request->session()->put('email',  $email);
    
                    return redirect('/dashboard')->withCookie($EmailCookie)->withCookie($PasswordCookie);
                } else {    
                    $request->session()->put('first_name', $first_name);
                    $request->session()->put('last_name', $last_name);
                    $request->session()->put('email',  $email);
    
                    return redirect('/dashboard');
                }
            }
    }
   
}
