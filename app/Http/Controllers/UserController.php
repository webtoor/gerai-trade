<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\Alamat;

class UserController extends Controller
{
    public function index(){
        $kategori = Kategori::with('sub_kategori')->get();
        $provinsi = Provinsi::all();

        return view('users.pengaturan', ['kategori' => $kategori, 'provinsi' => $provinsi]);
    }

    public function postAlamat(Request $request){
        $data = $request->validate([
            'nama_penerima' => 'required',
            'nomor_hp' => ['required', 'string','min:11', 'max:14'],
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'kota_kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan_desa' => ['required'],
        ]); 
        $user_id = Auth::user()->id;
        try {
            Alamat::create([
                'nama_penerima' => $data['nama_penerima'],
                'nomor_hp' => $data['nomor_hp'],
                'user_id' => $user_id,
                'alamat' => $data['alamat'],
                'jenis_alamat_id' => '2',
                'provinsi_id' => $data['provinsi'],
                'kota_kabupaten_id' => $data['kota_kabupaten'],
                'kecamatan_id' => $data['kecamatan'],
                'kelurahan_desa_id' => $data['kelurahan_desa']
    
            ]);
            return back()->withSuccess(trans('Anda Berhasil Menambah Alamat baru')); 

        } catch (\Exception $e) {
            //throw $e;
        }
       
    }
}
