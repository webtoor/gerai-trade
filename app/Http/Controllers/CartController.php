<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Produk;
use App\Models\Kategori;

class CartController extends Controller
{
    public function index(Request $request){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $produks = Produk::find($request->produk_id);
    	    Cart::add($produks->id, $produks->nama_produk, $request->qty, $produks->harga, ['slug' => $produks->slug]);
            return redirect('keranjang-belanja'); 
        }
    	
    }

    public function keranjangBelanja(){
        $kategori = Kategori::with('sub_kategori')->get();

        return view ('users.keranjangBelanja', ['kategori' => $kategori]);
    }

    public function update(Request $request){
        Cart::update($request->rowid, $request->qty);
        $kategori = Kategori::with('sub_kategori')->get();
        return back(); 
    }

    public function delete($rowId){
        Cart::remove($rowId);
        $kategori = Kategori::with('sub_kategori')->get();
        return back(); 
    }

  
}
