<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
        	'email' => ['required', 'email'],
        	'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
        	$request->session()->regenerate();

        	return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
        	'email' => 'Email atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
    	Auth::logout();

    	$request->session()->invalidate();

    	$request->session()->regenerateToken();
    	
    	return redirect('/');
    }
}
