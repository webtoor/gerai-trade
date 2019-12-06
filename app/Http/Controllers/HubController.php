<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
class HubController extends Controller
{
    public function index(){
        $hub_id = Auth::user()->id;
        $kategori = Kategori::with('sub_kategori')->get();
        $produk = Produk::where('hub_id', $hub_id)->get();
        return view ('users.hub.produkSaya', ['kategori' => $kategori, 'produk' => $produk]);
    }
}
