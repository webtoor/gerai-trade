<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produk;
class CartController extends Controller
{
    public function index(Request $request){
    	// Cart::destroy();
    	/* $product = Product::find($req->id);
    	Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $req->qty, 'price' => $product->price]);
        return redirect('keranjang'); */
        return $request->all();
    }
}
