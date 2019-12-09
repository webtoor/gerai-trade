<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;
use App\Models\ProdukImage;
class HubController extends Controller
{
    public function index(){
        $hub_id = Auth::user()->id;
        $kategori = Kategori::with('sub_kategori')->get();
        $produk = Produk::where('hub_id', $hub_id)->orderBy('id','desc')->get();
        return view ('users.hub.produkSaya', ['kategori' => $kategori, 'produk' => $produk]);
    }

    public function tambahProduk(){
        $kategori = Kategori::with('sub_kategori')->get();
        return view('users.hub.tambahProduk',  ['kategori' => $kategori]);
    }

    public function getAjaxSubkategori($kategori_id){
        $subkategori = SubKategori::where('kategori_id', $kategori_id)->get();

        return response()->json(
            [ 'status' => '1',
             'data' => $subkategori]
         );
    }

    public function insertProduk(Request $request){
        $hub_id = Auth::user()->id;
        $data = $request->validate([
            'kategori_id' => ['required'],
            'subkategori_id' => ['nullable'],
            'nama_produk' => ['required'], 
            'deskripsi' => ['required'], 
            'stok' => ['required', 'numeric'],
            'berat' => ['required','numeric'],
            'harga_dasar' => ['required', 'numeric'],
            'image_produk' => 'required|array|min:1|max:3',
            'image_produk.*' => 'file|mimes:jpeg,jpg,png|max:8000'
        ]); 
        
        try {
            $post = Produk::create([
            'hub_id' => $hub_id,
            'kategori_id' => $data['kategori_id'],
            'subkategori_id' => $data['subkategori_id'],
            'nama_produk' => $data['nama_produk'],
            'deskripsi' => $data['deskripsi'],
            'stok' => $data['stok'],
            'berat' => $data['berat'],
            'harga_dasar' => $data['harga_dasar'],
            'harga' => null,
            'status' => '0'
        ]);
        
            $newPost = $post->replicate();
        
            $files = $request->file('image_produk');
            if(!empty($files)) :
                foreach ($files as $file) :
                $imageName = 'image_'.time().Str::random(10).'.png';
                $path = Storage::disk('public')->putFileAs('produk', $file, $imageName);
                    ProdukImage::create([
                    'product_id' => $post->id,
                    'image_path' => $path,
                    ]);
                endforeach;
            endif;

            return redirect()->route('home.produk-saya')->withSuccess(trans('Berhasil Menambahkan Produk'));

        }catch(\Exception $e){
            return $e;
        }
    }

    public function editProduk($produk_id){
        
        $produk = Produk::with('produk_image')->where('id', $produk_id)->first();
        $kategori = Kategori::all();
        $subkategori = SubKategori::where('kategori_id', $produk->kategori_id)->get();

        return view('users.hub.edit-produk', ['produk' => $produk, 'kategori' => $kategori, 'subkategori' => $subkategori]);
    }

    public function updateProduk(Request $request, $produk_id){
        $data = $request->validate([
            'kategori_id' => ['required'],
            'subkategori_id' => ['nullable'],
            'nama_produk' => ['required'], 
            'deskripsi' => ['required'], 
            'stok' => ['required', 'numeric'],
            'berat' => ['required','numeric'],
            'harga_dasar' => ['required', 'numeric'],
        ]); 
        
        try {
            $post = Produk::findOrFail($produk_id);
            $post->slug = null;
            $post->update($data);
            $newPost = $post->replicate();

            return back()->withSuccess(trans('Anda Berhasil mengubah produk')); 
        } catch (\Exception $e) {
            
        }
 
    }

    public function tambahImage(Request $request){
        $data = $request->validate([
            'produk_id' => 'required',
            'image_produk' => 'required|file|mimes:jpeg,jpg,png|max:8000'
        ]); 
        
        try {
            $file = $request->file('image_produk');
            $imageName = 'image_'.time().Str::random(10).'.png';
            $path = Storage::disk('public')->putFileAs('produk', $file, $imageName);
                ProdukImage::create([
                'product_id' => $data['produk_id'],
                'image_path' => $path,
            ]);

            return back()->withSuccess(trans('Anda Berhasil Menambah Foto Produk')); 

        } catch (\Exception $e) {
            
        }
      
    }
}
