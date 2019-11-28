<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Alamat;

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

    public function cartShop($produk_id){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $produks = Produk::find($produk_id);
    	    Cart::add($produks->id, $produks->nama_produk, 1, $produks->harga, ['slug' => $produks->slug]);
            return redirect('keranjang-belanja'); 
        }
    	
    }

    public function cartWishlist($produk_id){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $produks = Produk::find($produk_id);
    	    Cart::instance('wishlist')->add($produks->id, $produks->nama_produk, 1, $produks->harga, ['slug' => $produks->slug]);
            return redirect('wishlist'); 
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

    public function addWishlist(Request $request){
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $produks = Produk::find($request->produk_id);
    	    Cart::instance('wishlist')->add($produks->id, $produks->nama_produk, $request->qty, $produks->harga, ['slug' => $produks->slug]);
            return redirect('wishlist'); 
        }
    }

    public function wishlist(){
        $carts = Cart::instance('wishlist')->content();
        $wishlist_cart = [];
        foreach($carts as $cartz){
            $wishlist_cart[] = $cartz->id;
        }
        
        if(count($wishlist_cart) > 0){
            $wishlist = Produk::with('produk_image')->whereIn('id', $wishlist_cart)->get();
        }else{
            $wishlist = [];
        }
        $kategori = Kategori::with('sub_kategori')->get();

        return view ('users.wishlist', ['kategori' => $kategori, 'wishlist' => $wishlist]);
    }

    public function deleteWishlist($rowId){
        Cart::instance('wishlist')->remove($rowId);
        $kategori = Kategori::with('sub_kategori')->get();
        return back(); 
    }

    public function checkout(){
        $user_id = Auth::user()->id;

        $alamat = Alamat::where(['user_id' => $user_id, 'jenis_alamat_id' => '2'])->orderBy('id', 'asc')->first();
        return view('users.chekout', ['alamat' => $alamat]);

    }

    public function cekOngkir(){
        
    }
}
