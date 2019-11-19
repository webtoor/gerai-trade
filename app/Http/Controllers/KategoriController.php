<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Produk;
use App\Models\ProdukImage;

class KategoriController extends Controller
{
    public function addKategori(Request $request){
        $data = $request->validate([
            'nama_kategori' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
        ]);
        $slug = strtolower($data['nama_kategori']);
        $slug_kategori= preg_replace('/\s+/', '-', $slug);
        try {
            Kategori::create([
                'kategori_name' => $data['nama_kategori'],
                'slug' => $slug_kategori
            ]);
            return back()->withSuccess(trans('Berhasil, Menambahkan Kategori')); 


        } catch (\Exception $e) {
            return $e;
        }

    }
    public function updateKategori(Request $request){
        $data = $request->validate([
            'kategori_id' => 'required',
            'kategori_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
        ]);
        $slug = strtolower($data['kategori_name']);
        $slug_kategori= preg_replace('/\s+/', '-', $slug);
        try {
            Kategori::findOrFail($data['kategori_id'])->update([
                'kategori_name' => $data['kategori_name'],
                'slug' => $slug_kategori
            ]);
            return back()->withSuccess(trans('Berhasil, Mengubah Kategori')); 


        } catch (\Exception $e) {
            return $e;
        }

    }

    public function addSubKategori(Request $request){
        
        $data = $request->validate([
            'kategori_id' => 'required',
            'nama_subkategori' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
        ]);
        $slug = strtolower($data['nama_subkategori']);
        $slug_subkategori= preg_replace('/\s+/', '-', $slug);
    
        try {
            SubKategori::create([
                'kategori_id' => $data['kategori_id'],
                'subkategori_name' => $data['nama_subkategori'],
                'slug' => $slug_subkategori
            ]);
            return back()->withSuccess(trans('Berhasil, Menambahkan Sub-Kategori')); 


        } catch (\Exception $e) {
            return $e;
        }

    }

    public function updateSubKategori(Request $request){
        $data = $request->validate([
            'subkategori_id' => 'required',
            'kategori_ids' => 'required',
            'subkategori_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
        ]);
        $slug = strtolower($data['subkategori_name']);
        $slug_subkategori= preg_replace('/\s+/', '-', $slug);

        try {
            SubKategori::findOrFail($data['subkategori_id'])->update([
                'kategori_id' => $data['kategori_ids'],
                'subkategori_name' => $data['subkategori_name'],
                'slug' => $slug_subkategori
            ]);
            return back()->withSuccess(trans('Berhasil, Mengubah Sub-Kategori')); 


        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showKategori($slug){
        //return request()->sort;
        $kategori =  Kategori::with('sub_kategori')->get();
        $kategori_menu = Kategori::where('slug', $slug)->first();
        if($kategori_menu){
            $kategori_menu = $kategori_menu;
            $sort = request()->sort;
            if($sort == 'desc'){
                $produk = Produk::with('produk_image')->where('kategori_id', $kategori_menu->id)->orderBy('id', 'desc')->paginate(20);
            }elseif($sort == 'murah'){
                $produk = Produk::with('produk_image')->where('kategori_id', $kategori_menu->id)->orderBy('harga', 'asc')->paginate(20);
            }elseif($sort == 'mahal'){
                $produk = Produk::with('produk_image')->where('kategori_id', $kategori_menu->id)->orderBy('harga', 'desc')->paginate(20);
            }else{
                $produk = Produk::with('produk_image')->where('kategori_id', $kategori_menu->id)->orderBy('id', 'desc')->paginate(20);
            }


        }else{
            $kategori_menu = SubKategori::with('kategori')->where('slug', $slug)->first();
            $sort = request()->sort;
            if($sort == 'desc'){
                $produk = Produk::with('produk_image')->where('subkategori_id', $kategori_menu->id)->orderBy('id', 'desc')->paginate(20);
            }elseif($sort == 'murah'){
                $produk = Produk::with('produk_image')->where('subkategori_id', $kategori_menu->id)->orderBy('harga', 'asc')->paginate(20);
            }elseif($sort == 'mahal'){
                $produk = Produk::with('produk_image')->where('subkategori_id', $kategori_menu->id)->orderBy('harga', 'desc')->paginate(20);
            }else{
                $produk = Produk::with('produk_image')->where('subkategori_id', $kategori_menu->id)->orderBy('id', 'desc')->paginate(20);
            }

        }
        return view('users.kategori', ['produk' => $produk, 'kategori' => $kategori, 'kategori_menu' => $kategori_menu , 'sort' => $sort]);
    }
}
