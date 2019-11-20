<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    function index(){
       $blog = Blog::with('user')->orderBy('id', 'desc')->get();
       return view ('admin.blogs.index', ['blog' => $blog]);
    }
    function addBlog(){
        return view ('admin.blogs.tambahCerita');
    }

    function insert(Request $request){
        $data = $request->validate([
            'user_id' => ['required'],
            'judul' => ['required'],
            'konten' => ['required'],
            'images' => 'required|mimes:jpeg,jpg,png|max:5000'
        ]); 
        
        try{
            $files = $request->file('images');
            $imageName = 'blog_'.time().Str::random(10).'.png';
            $path = Storage::disk('public')->putFileAs('blog', $files, $imageName);
                $post = Blog::create([
                'user_id' => $data['user_id'],
                'judul' => $data['judul'],
                'konten' => $data['konten'],
                'image' => $imageName
                ]);
            $newPost = $post->replicate();

            return redirect()->route('admin-panel.kelola-blog')->withSuccess(trans('Berhasil Menambahkan Cerita'));

        } catch (\Exception $e) {
            $e;
        }

    }

    function edit($blog_id){
        $blog = Blog::where('id', $blog_id)->first();
        return view('admin.blogs.edit', ['blog' => $blog]);
    } 
}
