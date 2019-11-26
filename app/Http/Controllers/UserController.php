<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Provinsi;

class UserController extends Controller
{
    public function index(){
        $kategori = Kategori::with('sub_kategori')->get();
        $provinsi = Provinsi::all();

        return view('users.pengaturan', ['kategori' => $kategori, 'provinsi' => $provinsi]);
    }
}
