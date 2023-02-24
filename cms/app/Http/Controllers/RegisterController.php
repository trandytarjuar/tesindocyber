<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class RegisterController extends Controller
{
    public function index()
    {
        return view('cms.auth.register');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
            'name' => 'required',
            'alamat' => 'required',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).*$/'
            ],
            'password_confirmation' => 'required|same:password',
            'nohp' => 'required|numeric'
        ]);
        
        // Cek validitas input
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        
        // Insert data ke database
        $user = new Users;
        $user->email = $request->email;
        $user->nama = $request->name;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->nohp = $request->nohp;
        $user->akses = 0;
        $user->save();
        
        // Redirect ke halaman sukses
        return redirect('/login');
    }

}
