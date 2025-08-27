<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.auth.login');
    }

    public function register()
    {
        return view('client.auth.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:6',
           'confirmation_password' => 'required|string|min:6|same:password',
        ]);

        User::create([
           "name" => $request->get('name'),
           "email" => $request->get("email"),
           "password" => Hash::make($request->get("password")),
        ]);
        Auth::attempt(['email' => $request->get("email"), 'password' => $request->get("password")]);

        return redirect()->intended('/');
    }



    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        if(Auth::attempt(['email' => $request->get("email"), 'password' => $request->get("password")])){
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with(["message" => "Email or Password is incorrect"]);
        }
    }

    public function processLogout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            return  redirect('/');
        }
    }
}
