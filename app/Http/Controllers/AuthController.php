<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $data = [
            "title" => "Register"
        ];
        return view('auth.pages.register', $data);
    }
    public function registerstore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' =>  'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success','Registration successfull! Please Login');
        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }

    public function login()
    {
        $data = [
            "title" => "Login"
        ];
        return view('auth.pages.login', $data);
    }
    public function loginstore(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
