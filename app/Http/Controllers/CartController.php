<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Alamat;
use App\Models\Wishlist;

class CartController extends Controller
{
    public function index(Request $request){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
             $produks = Produk::find($request->produk_id);
           /* $row_id = null;
            $quanty = null;
            foreach(Cart::instance('default')->content() as $rows){
                if($produks->id === $rows->id){
                    $row_id = $rows->rowId;
                    $quanty = $rows->qty;

                }
            }  
            if($row_id){
                $quanty = $quanty + $request->qty;
                $item =  Cart::get($row_id);
                $option = $item->options->merge(['item_code' => 'KEY02']);

                return Cart::content('default')->update($row_id, $option);
            }else{
               Cart::instance('default')->add($produks->id, $produks->nama_produk, $request->qty, $produks->harga, ['slug' => $produks->slug, 'note' => $request->ctt, 'weight' => $produks->berat, 'hub_id' => $produks->hub_id]);
            } */
            
            Cart::instance('default')->add($produks->id, $produks->nama_produk, $request->qty, $produks->harga, ['slug' => $produks->slug, 'weight' => $produks->berat, 'hub_id' => $produks->hub_id]);

            return redirect('keranjang-belanja'); 
        }
    	
    }

    public function cartShop($produk_id){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $produks = Produk::find($produk_id);
    	    Cart::instance('default')->add($produks->id, $produks->nama_produk, 1, $produks->harga, ['slug' => $produks->slug, 'weight' => $produks->berat, 'hub_id' => $produks->hub_id]);
            return redirect('keranjang-belanja'); 
        }
    	
    }

    public function cartWishlist($produk_id){
        //Cart::destroy();
        if(Auth::guest()){
            return redirect('login'); 

        }else{
            $user_id = Auth::user()->id;
            $produks = Produk::find($produk_id);
            $wishlist = Cart::instance('wishlist')->add($produks->id, $produks->nama_produk, 1, $produks->harga, ['slug' => $produks->slug, 'weight' => $produks->berat, 'hub_id' => $produks->hub_id]);
            Wishlist::create([
                'user_id' => $user_id,
                'produk_id' => $produk_id
            ]);
            return redirect('wishlist'); 
        }
    	
    }

    public function keranjangBelanja(){
        $kategori = Kategori::with('sub_kategori')->get();
       

        return view ('users.keranjangBelanja', ['kategori' => $kategori]);
    }

    public function update(Request $request){
        Cart::instance('default')->update($request->rowid, $request->qty);
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
    	    Cart::instance('wishlist')->add($produks->id, $produks->nama_produk, $request->qty, $produks->harga, ['slug' => $produks->slug, 'weight' => $produks->berat]);
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
        $wishlist =  Cart::instance('wishlist')->get($rowId);
        Wishlist::where(['user_id' => Auth::user()->id, 'produk_id' => $wishlist->id])->delete();
        Cart::instance('wishlist')->remove($rowId);
        DB::statement("ALTER TABLE wishlist AUTO_INCREMENT = 1");

        $kategori = Kategori::with('sub_kategori')->get();
        return back(); 
    }

    public function checkout(){
        //city();
        /* Cart::update($request->rowid, $request->qty); */
        $produk_id = [];
        foreach (Cart::instance('default')->content() as $row) {
            $produk_id[] = Produk::with('origin')->where('id', $row->id)->first();
        }

        $dataOrigin = [];
        foreach($produk_id as $data){
            $dataOrigin[] = $data->origin;
        }

        $origin = collect($dataOrigin)->unique('user_id');

        $user_id = Auth::user()->id;

        $alamat = Alamat::where(['user_id' => $user_id, 'jenis_alamat_id' => '2'])->orderBy('id', 'asc')->first();

        return view('users.chekout', ['alamat' => $alamat, 'origin' => $origin]);

    }

    public function cekOngkir(Request $request){
        $weight = 0;
        foreach (Cart::instance('default')->content() as $row) {
            if($row->options->hub_id == $request->json('hub_id')){
                $produk = Produk::find($row->id);
                $weight += ($produk->berat) * ($row->qty);
            }

        }

         //return response()->json($weight); 

        $cost = Cost($request->json('districts_origin'), $request->json('districts_destination'), $weight, $request->json('eks'));
        $data = json_decode($cost, true);
        return response()->json($data);

    }
}
