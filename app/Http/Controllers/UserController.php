<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class UserController extends Controller
{
    public function index(){
        $kategori = Kategori::with('sub_kategori')->get();

        return view('users.pengaturan', ['kategori' => $kategori]);
    }
}
