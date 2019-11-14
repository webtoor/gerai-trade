<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produk;
class CartController extends Controller
{
    public function index(Request $request){
    	// Cart::destroy();
    	$produk = Produk::find($request->produk_id);
    	return Cart::add(['id' => $produk->id, 'name' => $produk->nama_produk, 'qty' => $request->qty, 'price' => $produk->harga]);
        return redirect('keranjang'); 
        return $request->all();
    }

    public function keranjangBelanja(){
        
    }
}
