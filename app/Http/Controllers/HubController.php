<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;
use App\Models\ProdukImage;
class HubController extends Controller
{
    public function index(){
        $hub_id = Auth::user()->id;
        $kategori = Kategori::with('sub_kategori')->get();
        $produk = Produk::where('hub_id', $hub_id)->get();
        return view ('users.hub.produkSaya', ['kategori' => $kategori, 'produk' => $produk]);
    }

    public function tambahProduk(){
        $kategori = Kategori::with('sub_kategori')->get();
        return view('users.hub.tambahProduk',  ['kategori' => $kategori]);
    }

    public function getAjaxSubkategori($kategori_id){
        $subkategori = SubKategori::where('kategori_id', $kategori_id)->get();

        return response()->json(
            [ 'status' => '1',
             'data' => $subkategori]
         );
    }
}
