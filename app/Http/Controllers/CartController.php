<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produk;
use App\Models\Kategori;

class CartController extends Controller
{
    public function index(Request $request){
    	//Cart::destroy();
    	$produks = Produk::find($request->produk_id);
    	Cart::add($produks->id, $produks->nama_produk, $request->qty, $produks->harga);
        return redirect('keranjang-belanja'); 
    }

    public function keranjangBelanja(){
        $kategori = Kategori::with('sub_kategori')->get();

        return view ('users.keranjangBelanja', ['kategori' => $kategori]);
    }
}
