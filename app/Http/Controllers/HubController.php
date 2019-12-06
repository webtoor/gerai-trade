<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class HubController extends Controller
{
    public function index(){
        $kategori = Kategori::with('sub_kategori')->get();

        return view ('users.hub.produkSaya', ['kategori' => $kategori]);
    }
}
