<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;
use App\Models\ProdukImage;
class ProdukController extends Controller
{
    public function search(){
       
        $filter = request()->filter;
        $kategori =  Kategori::with('sub_kategori')->get();
        $produk = Produk::with('kategori', 'subkategori')->where('nama_produk', 'like',"%".$filter."%")->paginate(20);
        return view('users.resultSearch', ['kategori' => $kategori, 'produk' => $produk, 'filter' => $filter]);
    }
}
