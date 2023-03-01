<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function submit(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $user = User::where('email', $credential['email'])->first();

        if (!$user) {
            return redirect('/admin/login')->with('akses', 'Email tidak terdaftar');
        }

        if ($user->akses === 1) {
            return redirect('/admin/login')->with('akses', 'Akses tidak diizinkan');
        }
        // dd($user); die;

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('gagallogin', 'login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
