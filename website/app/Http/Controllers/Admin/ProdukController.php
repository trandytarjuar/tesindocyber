<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $nama_file = $produk->image;
        $produk->delete();

        if (file_exists(public_path('public/upload/' . $nama_file))) {
            unlink(public_path('public/upload/' . $nama_file));
        }
        return redirect('/admin/produk')->with('dihapus', 'Barang berhasil dihapus');
    }
    public function create()
    {
        // dd('tes');

        return view('admin.produk.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|unique:tbl_produk',
            'harga' => 'required',
            'stock' => 'required|numeric',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        // dd($valid);
        $produks = new Produk;
        $produks->nama_produk = $request->nama_produk;
        $harga = str_replace('.', '', $request->harga);
        $produks->harga = $harga;
        $produks->stock = $request->stock;
        $produks->save();


        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/upload');


                $images[] = str_replace('public/admin/images/upload', '', $path);
            }
            $produks_image = implode(',', $images);
            $produks->image = str_replace('public/upload/', '', $produks_image);
            $produks->save();
        }
        return redirect('/admin/produk')->with('berhasilnambah', 'Barang berhasil ditambahkan');


    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|unique:tbl_produk',
            'harga' => 'required',
            'stock' => 'required|numeric',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->input('nama_produk');
        $harga = str_replace('.', '', $request->input('harga'));
        $produk->harga = $harga;
        $produk->stock = $request->input('stock');
        $produk->save();

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/upload');


                $images[] = str_replace('public/admin/images/upload', '', $path);
            }
            $produks_image = implode(',', $images);
            $produk->image = str_replace('public/upload/', '', $produks_image);
            $produk->save();
        }
        return redirect('/admin/produk')->with('update', 'Barang berhasil diupdate');
    }
}
