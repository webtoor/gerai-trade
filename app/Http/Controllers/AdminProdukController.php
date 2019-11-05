<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\User_role;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;

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
    public function insert(Request $request){
        //return htmlentities($request['deskripsi']);
        $data = $request->validate([
            'mitra_id' => ['required'],
            'kategori_id' => ['required'],
            'subkategori_id' => ['nullable'],
            'nama_produk' => ['required'], 
            'deskripsi' => ['required'], 
            'stok' => ['required'],
            'harga' => ['required'],
            'image_produk' => 'required|array|min:1|max:3',
            'image_produk.*' => 'mimes:jpeg,jpg,png|max:5100'

        ]); 



        $post = new Produk([
            'mitra_id' => $data['mitra_id'],
            'kategori_id' => $data['kategori_id'],
            'subkategori_id' => $data['subkategori_id'],
            'nama_produk' => $data['nama_produk'],
            'deskripsi' => $data['deskripsi'],
            'stok' => $data['stok'],
            'harga' => $data['harga'],
        ]);
        
        
        $post->save();
        
        $newPost = $post->replicate();

        $files = $request->file('image_produk');
        if(!empty($files)) :
            foreach($files as $file) :
                $imageName = 'image_'.time().Str::random(10).'.png';
                $path = Storage::disk('public')->putFileAs('produk', $file, $imageName);
                ProdukImage::create([
                    'produk_id' => $post->id,
                    'image_path' => $path,
                  ]);
            endforeach;
        endif;
       
    }
}
