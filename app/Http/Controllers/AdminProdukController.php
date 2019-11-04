<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;
use App\Models\Kategori;
use App\Models\SubKategori;

class AdminProdukController extends Controller
{
    public function index(){
        return view('admin.dashboard.produk');
    }

    public function add(){
        $kategori = Kategori::all();
        $mitra = User_role::where('role_id', 2)->get();
        return view('admin.dashboard.tambahProduk', ['kategori' => $kategori, 'mitra' => $mitra]);
    }

    public function getAjaxSubkategori($kategori_id){
        $subkategori = SubKategori::where('kategori_id', $kategori_id)->get();

        return response()->json(
            [ 'status' => '1',
             'data' => $subkategori]
         );
    }
}
