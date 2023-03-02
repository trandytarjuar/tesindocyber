<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
