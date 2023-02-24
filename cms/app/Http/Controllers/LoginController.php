<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('cms.auth.login');
    }
    public function submit(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = Users::byEmail($credentials['email'])->first();
        // dd($user); die;

        if (Auth::attempt($user)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}
