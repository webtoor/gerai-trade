<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\User_role;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;
use App\Models\ProdukImage;

class AdminProdukController extends Controller
{
    public function index(){
        $produk = Produk::with('produk_image')->get();
        return view('admin.dashboard.produk.index', ['produk' => $produk]);
    }

    public function add(){
        $kategori = Kategori::all();
        $mitra = User_role::where('role_id', 2)->get();
        return view('admin.dashboard.produk.tambahProduk', ['kategori' => $kategori, 'mitra' => $mitra]);
    }

    public function getAjaxSubkategori($kategori_id){
        $subkategori = SubKategori::where('kategori_id', $kategori_id)->get();

        return response()->json(
            [ 'status' => '1',
             'data' => $subkategori]
         );
    }
    public function insert(Request $request){
        $data = $request->validate([
            'mitra_id' => ['required'],
            'kategori_id' => ['required'],
            'subkategori_id' => ['required','nullable'],
            'nama_produk' => ['required'], 
            'deskripsi' => ['required'], 
            'stok' => ['required'],
            'harga' => ['required'],
            'link_tokped' => ['nullable'],
            'link_shopee' => ['nullable'],
            'link_bukalapak' => ['nullable'],
            'image_produk' => 'required|array|min:1|max:3',
            'image_produk.*' => 'file|mimes:jpeg,jpg,png|max:8000'
        ]); 
        
        try {
            $post = Produk::create([
            'mitra_id' => $data['mitra_id'],
            'kategori_id' => $data['kategori_id'],
            'subkategori_id' => $data['subkategori_id'],
            'nama_produk' => $data['nama_produk'],
            'deskripsi' => $data['deskripsi'],
            'stok' => $data['stok'],
            'harga' => $data['harga'],
            'link_tokped' => $data['link_tokped'],
            'link_shopee' => $data['link_shopee'],
            'link_bukalapak' => $data['link_bukalapak'],

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

            return redirect()->route('admin-panel.kelola-produk')->withSuccess(trans('Berhasil Menambahkan Produk'));

        }catch(\Exception $e){
            return $e;
        }
    }

    public function edit($id){
        
        $produk = Produk::with('produk_image')->where('id', $id)->first();
        $mitra = User_role::where('role_id', 2)->get();
        $kategori = Kategori::all();
        $subkategori = SubKategori::where('kategori_id', $produk->kategori_id)->get();

        return view('admin.dashboard.produk.edit', ['produk' => $produk, 'mitra' => $mitra, 'kategori' => $kategori, 'subkategori' => $subkategori]);
    }

    public function updateProduk(Request $request, $produk_id){
        
        $data = $request->validate([
            'mitra_id' => ['required'],
            'kategori_id' => ['required'],
            'subkategori_id' => ['nullable'],
            'nama_produk' => ['required'], 
            'deskripsi' => ['required'], 
            'stok' => ['required'],
            'harga' => ['required'],
            'link_tokped' => ['nullable'],
            'link_shopee' => ['nullable'],
            'link_bukalapak' => ['nullable'],
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

    public function deleteImage($produk_id){
        $produk_image = ProdukImage::findOrFail($produk_id);
        Storage::disk('public')->delete($produk_image->image_path);
        $produk_image->delete();
        DB::statement("ALTER TABLE product_images AUTO_INCREMENT = 1");
        return back()->withSuccess(trans('Anda Berhasil menghapus Foto Produk')); 
    }

    public function deleteProduk($produk_id){
        $produk_image = ProdukImage::findOrFail($produk_id);
        Storage::disk('public')->delete($produk_image->image_path);
        $produk_image->delete();
        DB::statement("ALTER TABLE product_images AUTO_INCREMENT = 1");

        $produk = Produk::findOrFail($produk_id)->delete();
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");
        return back()->withSuccess(trans('Anda Berhasil menghapus Produk')); 

    }
}
