<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\KotaKabupaten;

use App\Models\Alamat;

class UserController extends Controller
{
    public function index(){
        $kategori = Kategori::with('sub_kategori')->get();
        $provinsi = province();
        $user_id = Auth::user()->id;

        $alamat = Alamat::where(['user_id' => $user_id, 'jenis_alamat_id' => '2'])->get();

        return view('users.pengaturan', ['kategori' => $kategori, 'provinsi' => $provinsi, 'alamat' => $alamat]);
    }

    public function postAlamat(Request $request){
       $data = $request->validate([
            'nama_penerima' => 'required',
            'nohp_penerima' => ['required', 'string','min:11'],
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
                'nohp_penerima' => $data['nohp_penerima'],
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
    public function ubahAlamat(Request $request){
        $data = $request->validate([
            'alamat_id' => 'required',
            'unama_penerima' => 'required',
            'unohp_penerima' => ['required', 'string','min:11'],
            'ualamat' => ['required'],
            'uprovinsi' => ['required'],
            'ukota_kabupaten' => ['required'],
            'ukecamatan' => ['required'],
            'ukelurahan_desa' => ['required'],
        ]); 
       try {
        Alamat::where('id', $data['alamat_id'])->update([
            'nama_penerima' => $data['unama_penerima'],
            'nohp_penerima' => $data['unohp_penerima'],
            'alamat' => $data['ualamat'],
            'provinsi_id' => $data['uprovinsi'],
            'kota_kabupaten_id' => $data['ukota_kabupaten'],
            'kecamatan_id' => $data['ukecamatan'],
            'kelurahan_desa_id' => $data['ukelurahan_desa']

        ]);
        return back()->withSuccess(trans('Anda Berhasil Mengubah Alamat')); 
       } catch (\Throwable $th) {
           //throw $th;
       }
         
    }

    public function deleteAlamat($alamat_id){
        $alamat = Alamat::findOrFail($alamat_id);
        $alamat->delete();
        
        DB::statement("ALTER TABLE alamats AUTO_INCREMENT = 1");

        return back()->withSuccess(trans('Anda Berhasil Alamat Pengiriman')); 
    }
}
