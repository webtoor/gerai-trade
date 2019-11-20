<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    function index(){
       return view ('admin.blogs.index');
    }
    function addBlog(){
        return view ('admin.blogs.tambahCerita');
    }

    function insert(Request $request){
        return $data = $request->validate([
            'user_id' => ['required'],
            'judul' => ['required'],
            'konten' => ['required'],
            'image' => 'required|file|mimes:jpeg,jpg,png|max:5000'
        ]); 
    }
}
