<?php

namespace App\Http\Controllers\ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user->akses === 0) {
            return response()->json(['success' => false, 'message' => 'Access denied']);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['success' => true]);
        }

      

        return response()->json(['success' => false, 'message' => 'Invalid login credentials']);
    }

    public function register(Request $request)
    {
        // dd("tes");
        die;
        $request->validate([
            'email' => 'required|email:dns|max:50|unique:users',
            'name' => 'required',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            ],
            'nohp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $user = new User();
        // dd($produks);
        $user = new User;
        $user->email = $request->email1;
        $user->name = $request->nama;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password1);
        $user->nohp = $request->nohp;
        $user->akses = 0;
        $user->save();

        // Return a success response
        return response()->json(['message' => 'User registered successfully.']);
        // dd("test");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/ecom/home');
    }
}
