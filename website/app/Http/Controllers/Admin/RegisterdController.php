<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterdController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }
    public function store(Request $request)
    {
        dd("masuk");
    }
}
