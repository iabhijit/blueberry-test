<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    function loginPost(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password'=>'required'
        ]);

        $credentials = $request->only(['email','password']);

        if ( Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'email' => 'Login credentials not correct.',
            ]);
        }
    }


    function registration(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('registration');
    }
    function registrationPost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|custom_password'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
       // $user = User::create($data);

        try {
            $user = User::create($data);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Registration failed. Please try again later.',
            ]);
        }

        // Registration successful
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');

    }
    function logout(){

        Session::flush();
        Auth::logout();
        return redirect()->route('login');

    }

}
