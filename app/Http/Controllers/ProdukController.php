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
        $sort = request()->sort;
        $kategori =  Kategori::with('sub_kategori')->get();
        $produk = Produk::with('kategori', 'subkategori')->where('nama_produk', 'like',"%".$filter."%")->paginate(2);
        if($sort == 'desc'){
            $produk = Produk::with('kategori', 'subkategori', 'produk_image')->where('nama_produk', 'like',"%".$filter."%")->orderBy('id', 'desc')->paginate(20);
        }elseif($sort == 'murah'){
            $produk = Produk::with('kategori', 'subkategori', 'produk_image')->where('nama_produk', 'like',"%".$filter."%")->orderBy('harga', 'asc')->paginate(20);
        }elseif($sort == 'mahal'){
            $produk = Produk::with('kategori', 'subkategori', 'produk_image')->where('nama_produk', 'like',"%".$filter."%")->orderBy('harga', 'desc')->paginate(20);
        }else{
            $produk = Produk::with('kategori', 'subkategori', 'produk_image')->where('nama_produk', 'like',"%".$filter."%")->orderBy('id', 'desc')->paginate(20);
        }
        return view('users.resultSearch', ['kategori' => $kategori, 'produk' => $produk, 'filter' => $filter, 'sort' => $sort]);
    }
}
