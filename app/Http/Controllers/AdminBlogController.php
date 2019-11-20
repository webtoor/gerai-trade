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
        $data = $request->validate([
            'user_id' => ['required'],
            'judul' => ['required'],
            'konten' => ['required'],
            'image' => 'required|mimes:jpeg,jpg,png|max:5000'
        ]); 
        
        try {
            $files = $request->file('image');
            $imageName = 'blog_'.time().Str::random(10).'.png';
            $path = Storage::disk('public')->putFileAs('blog', $file, $imageName);
                $post = Blog::create([
                'user_id' => $data['user_id'],
                'judul' => $data['judul'],
                'konten' => $data['konten'],
                'image' => $imageName
                ]);
            $newPost = $post->replicate();

            return redirect()->route('admin-panel.kelola-blog')->withSuccess(trans('Berhasil Menambahkan Cerita'));

        } catch (\Exception $e) {
            //throw $th;
        }
       

    }
}
