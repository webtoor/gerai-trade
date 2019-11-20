<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
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
                'image' => $path
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

    function updateBlog(Request $request, $blog_id){
        $data = $request->validate([
            'user_id' => ['required'],
            'judul' => ['required'],
            'konten' => ['required'],
        ]); 
        try {
            $post = Blog::findOrFail($blog_id);
            $post->slug = null;
            $post->update([
                'user_id' => $data['user_id'],
                'judul' => $data['judul'],
                'konten' => $data['konten']
            ]);
            $newPost = $post->replicate();
    
    
            return back()->withSuccess(trans('Anda Berhasil Memperbarui')); 
            
        }catch (\Exception $e) {
            //$e;
        }
      
    } 

    function updateImageBlog(Request $request){
        $data = $request->validate([
            'blog_id' => 'required',
            'image_blog' => 'required|mimes:jpeg,jpg,png|max:5000'
        ]); 
        try {
            $blog_image = Blog::findOrFail($data['blog_id']);
            Storage::disk('public')->delete($blog_image->image);
            $file = $request->file('image_blog');
            $imageName = 'blogs_'.time().Str::random(10).'.png';
            $path = Storage::disk('public')->putFileAs('blog', $file, $imageName);
            $blog_image->update([
                'image' => $path
            ]);
            return back()->withSuccess(trans('Anda Berhasil Memperbarui Banner')); 
        } catch (\Exception $e) {
            //throw $e;
        }
       
    }

    function deleteBlog($blog_id){
        $blog_image = Blog::findOrFail($blog_id);
        Storage::disk('public')->delete($blog_image->image);
        $blog_image->delete();
        
        DB::statement("ALTER TABLE blogs AUTO_INCREMENT = 1");

        return back()->withSuccess(trans('Anda Berhasil Menghapus Cerita')); 

    }
}
