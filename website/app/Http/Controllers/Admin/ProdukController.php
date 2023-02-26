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
        // dd($produks);
        return view('admin.produk.index', compact('produks'));
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $nama_file = $produk->image;
        // dd(public_path('public/upload/' . $nama_file)); die;
        $produk->delete();

        if (file_exists(public_path('public/upload/' . $nama_file))) {
            unlink(public_path('public/upload/' . $nama_file));
        }
        // return redirect()->route('produk.index')
        //     ->with('success', 'Produk berhasil dihapus');
        return redirect('/admin/produk')->with('dihapus', 'Barang berhasil dihapus');
    }
    public function create()
    {
        // dd('tes');

        return view('admin.produk.create');
    }
    public function store(Request $request)
    {
        // dd($request); 
        // dd(str_replace('.', '', $request->harga)); die;
        $request->validate([
            'nama_produk' => 'required|unique:tbl_produk',
            'harga' => 'required',
            'stock' => 'required|numeric',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        // dd($valid);
        $produks = new Produk;
        // dd($produks);
        $produks->nama_produk = $request->nama_produk;
        $harga = str_replace('.', '', $request->harga);
        $produks->harga = $harga;

        // $produks->harga = $request->harga;
        $produks->stock = $request->stock;
        // $produks->image = $request->images;
        $produks->save();


        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/upload');


                $images[] = str_replace('public/admin/images/upload', '', $path);
            }
            $produks_image = implode(',', $images);
            // dd($produks_image); die;
            $produks->image = str_replace('public/upload/', '', $produks_image);
            // dd($produks->image); die;
            $produks->save();
        }
        return redirect('/admin/produk')->with('berhasilnambah', 'Barang berhasil ditambahkan');
        // dd($images);



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

    public function getImages()
    {
        $images = Produk::pluck('gambar')->toArray();
        dd($images); 
        return response()->json($images);
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
        // $produk->harga = $request->input('harga');
        $produk->stock = $request->input('stock');
        $produk->save();

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/upload');


                $images[] = str_replace('public/admin/images/upload', '', $path);
            }
            $produks_image = implode(',', $images);
            // dd($produks_image); die;
            $produk->image = str_replace('public/upload/', '', $produks_image);
            // dd($produks->image); die;
            $produk->save();
        }
        return redirect('/admin/produk')->with('update', 'Barang berhasil diupdate');

        // dd('tes');
    }
}
