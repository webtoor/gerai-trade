<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\ProdukUlasan;
use App\Models\ProdukUnggulan;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori =  Kategori::with('sub_kategori')->get();
        $produk_terbaru = Produk::with('user', 'produk_image')->where('status', '1')->orderBy('id', 'desc')->take('12')->get();
        $blog = Blog::with('user')->where('status', '1')->orderBy('id', 'desc')->take(6)->get();
        return view('users.index', ['kategori' => $kategori, 'produk_terbaru' => $produk_terbaru, 'blog' => $blog]);
    }

    public function showDaftarMitra()
    {
        $provinsi = Provinsi::all();

        return view('users.daftarMitra', ['provinsi' => $provinsi]);
    }

    public function insertDaftarMitra(Request $request){
      
        $data = $request->validate([
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'kota_kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan_desa' => ['required']
        ]); 

        $user = User::findOrFail(Auth::user()->id)->update([
            'status_mitra' => '2'
        ]);
        Alamat::create([
            'alamat' => $data['alamat'],
            'user_id' => Auth::user()->id,
            'jenis_alamat_id' => '1',
            'provinsi_id' => $data['provinsi'],
            'kota_kabupaten_id' => $data['kota_kabupaten'],
            'kecamatan_id' => $data['kecamatan'],
            'kelurahan_desa_id' => $data['kelurahan_desa']
        ]);
        return redirect()->route('home.home' );
    }

    public function produkDetail($slug_produk){
   
        $kategori =  Kategori::with('sub_kategori')->get();
        $produk_detail = Produk::with(['produk_image', 'kategori' , 'subkategori'])->where('slug', $slug_produk)->orderBy('id', 'desc')->first();
        $produk_ulasan = ProdukUlasan::with('user')->where('produk_id', $produk_detail->id)->orderBy('id', 'desc')->paginate(1);
        return view('users.produk', ['kategori' => $kategori, 'produk_detail' => $produk_detail, 'produk_ulasan' => $produk_ulasan]);
    }

    public function produkDetailPagination($produk_id){
       
            $produk_ulasan = ProdukUlasan::with('user')->where('produk_id', $produk_id)->orderBy('id', 'desc')->paginate(1);
            return view('users.pagination.produkUlasan', ['produk_ulasan' => $produk_ulasan])->render();
        
    }

    public function siapaKita(){
        $kategori =  Kategori::with('sub_kategori')->get();
        return view('users.siapaKita', ['kategori' => $kategori]);
    }
    public function kontakKita(){
        $kategori =  Kategori::with('sub_kategori')->get();
        return view('users.kontakKita', ['kategori' => $kategori]);
    }
   
}
