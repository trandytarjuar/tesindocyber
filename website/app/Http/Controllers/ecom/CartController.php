<?php

namespace App\Http\Controllers\ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addtocart(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        // dd($produk->stock);

        $quantity = $request->input('newQty');
        // dd($quantity);
        $stok = $produk->stock;

        if ($quantity > $stok) {
            return response()->json(['success' => false, 'message' => 'quantity melebihi stock']);
        }
        $user_id = Auth::user()->id;

        // dd(Keranjang::where('id_produk', $id));

        $cart = Keranjang::where('id_produk', $id)
            ->where('id_user', $user_id)
            ->where('status_checkout', 'Tidak')
            ->first();
        if ($cart) {
            $new_quantity = $cart->qty + $quantity;
            if ($new_quantity > $stok) {
                return response()->json(['success' => false, 'message' => 'quantity melebihi stock']);
            }
            $cart->qty = $new_quantity;
            $cart->save();
        } else {
            $cart = new Keranjang;
            $cart->id_user = $user_id;
            $cart->id_produk = $produk->id;
            $cart->qty = $quantity;
            $cart->status_checkout = 'Tidak';
            $cart->save();
        }

        return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke keranjang.']);
        // return response()->json(['success' => false, 'message' => 'Invalid login credentials']);
    }
    public function countKeranjang()
    {
        // ambil id user dari session atau autentikasi
        $id_user = auth()->user()->id;

        // hitung jumlah produk yang ada di keranjang untuk user yang sedang login
        $count = Keranjang::where('id_user', $id_user)
            ->where('status_checkout', 'Tidak')
            ->count('id');

        return response()->json(['success' => true, 'count' => $count]);
    }
    public function detail($id)
    {
        $keranjangs =Keranjang::where('id_user', $id)
        
                        ->join('tbl_produk', 'tbl_keranjang.id_produk', '=', 'tbl_produk.id')
                        
                        ->get();
        // dd($keranjangs);
        
        return view('ecom.detail', compact('keranjangs'));
    }
    public function cekout($id){
        $keranjangs = Keranjang::where('id_user', $id)->get();
        foreach ($keranjangs as $keranjang) {
            // $keranjang = $keranjang->qty;
            // $harga = $keranjang->harga;
            // $total = $quantity * $harga;
            // $subtotal += $total;
    
            // Update the Keranjang model to mark the item as checked out
            $keranjang->status_checkout = 'ya';
            $keranjang->save();
        }
        return response()->json(['success' => true, 'message' => 'Produk berhasil dicekout.']);

    }
    public function delete($id){
        $keranjang = Keranjang::where('id_produk',$id)->first();
        $keranjang->delete();
        return response()->json(['success' => true, 'message' => 'Produk berhasil dihapus.']);

    }
}
