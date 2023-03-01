<?php

namespace App\Http\Controllers\ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
       
        // dd($produks);
        return view('ecom.index', compact('produks'));
    }
    public function detail($id)
    {
        $produk = Produk::findOrFail($id);
        return view('ecom.detail', compact('produk'));
        // dd($id);
    }
    
    //
}
