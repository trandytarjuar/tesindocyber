<?php

namespace App\Http\Controllers\ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
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
    public function actlogin(Request $request)
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
        $validator = Validator::make($request->all(), [
            'email' => 'email:dns|max:50|unique:users',
            'nama' => 'required',
            'password' => [
                
                'string',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            ],
            'nohp' => 'required|numeric',
            'alamat' => 'required',
            'password_confirmation' => 'same:password'
        ]);
        // dd($validator);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }

    

        $user = new User();
        $user = new User;
        $user->email = $request->email1;
        $user->name = $request->nama;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password1);
        $user->nohp = $request->nohp;
        $user->akses = 1;
        $user->save();
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return response()->json(['success' => true]);
        }
        return response()->json(['message' => 'User registered successfully.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/ecom/home');
    }
}
