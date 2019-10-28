<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index');
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
}
