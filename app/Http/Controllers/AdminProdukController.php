<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index(){
        return view('admin.dashboard.produk');
    }

    public function add(){
        return view('admin.dashboard.tambahProduk');
    }
}
