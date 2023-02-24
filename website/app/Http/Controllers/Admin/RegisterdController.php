<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;


class RegisterdController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'email'=>'required|email:dns|max:50|unique:users',
            'password'=>[
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).*$/'
            ],
            'nohp' => 'required|numeric',
            'password_confirmation' => 'required|same:password'
        ]); 
       
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->nohp = $request->nohp;
        $user->akses = 0;
        $user->save();

        $request->session()->flash('berhasil','pendaftaran berhasil');
        
        // Redirect ke halaman sukses
        return redirect('/login')->with('berhasil','pendaftaran berhasil');
        // dd($request); die;
    }
}
