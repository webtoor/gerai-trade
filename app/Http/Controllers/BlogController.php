<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Blog;
class BlogController extends Controller
{
    public function singleBlog($slug){
        $kategori =  Kategori::with('sub_kategori')->get();

        return view('users.singleBlog', ['kategori' => $kategori]);
    }
}
