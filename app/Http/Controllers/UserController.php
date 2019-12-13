<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\KotaKabupaten;

use App\Models\Alamat;
use App\Models\Pesan;
use App\Models\PesanDetail;

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
            'province_id' => ['required'],
            'province_name' => ['required'],
            'city_id' => ['required'],
            'city_name' => ['required'],
            'kecamatan_id' => ['required'],
            'kecamatan_name' => ['required'],
            'kodepos' => ['nullable']
        ]); 
        $user_id = Auth::user()->id;
        try {
            Alamat::create([
                'nama_penerima' => $data['nama_penerima'],
                'nohp_penerima' => $data['nohp_penerima'],
                'user_id' => $user_id,
                'alamat' => $data['alamat'],
                'jenis_alamat_id' => '2',
                'province_id' => $data['province_id'],
                'province_name' => $data['province_name'],
                'city_id' => $data['city_id'],
                'city_name' => $data['city_name'],
                'kecamatan_id' => $data['kecamatan_id'],
                'kecamatan_name' => $data['kecamatan_name'],
                'kodepos' => $data['kodepos']
    
            ]);
            return back()->withSuccess(trans('Anda Berhasil Menambah Alamat baru')); 

        } catch (\Exception $e) {
            throw $e;
        }
       
    }
    public function ubahAlamat(Request $request){
       $data = $request->validate([
            'alamat_id' => 'required',
            'unama_penerima' => 'required',
            'unohp_penerima' => ['required', 'string','min:11'],
            'ualamat' => ['required'],
            'uprovince_id' => ['required'],
            'uprovince_name' => ['required'],
            'ucity_id' => ['required'],
            'ucity_name' => ['required'],
            'ukecamatan_id' => ['required'],
            'ukecamatan_name' => ['required'],
            'ukodepos' => ['nullable']
        ]); 
       try {
        Alamat::where('id', $data['alamat_id'])->update([
            'nama_penerima' => $data['unama_penerima'],
            'nohp_penerima' => $data['unohp_penerima'],
            'alamat' => $data['ualamat'],
            'province_id' => $data['uprovince_id'],
            'province_name' => $data['uprovince_name'],
            'city_id' => $data['ucity_id'],
            'city_name' => $data['ucity_name'],
            'kecamatan_id' => $data['ukecamatan_id'],
            'kecamatan_name' => $data['ukecamatan_name'],
            'kodepos' => $data['ukodepos']

        ]);
        return back()->withSuccess(trans('Anda Berhasil Mengubah Alamat')); 
       } catch (\Throwable $th) {
           throw $th;
       }
         
    }

    public function deleteAlamat($alamat_id){
        $alamat = Alamat::findOrFail($alamat_id);
        $alamat->delete();
        
        DB::statement("ALTER TABLE alamats AUTO_INCREMENT = 1");

        return back()->withSuccess(trans('Anda Berhasil Alamat Pengiriman')); 
    }

    public function getChat(){
        $user_id = Auth::user()->id;
        $kategori = Kategori::with('sub_kategori')->get();
        $pesan = Pesan::with(['pesan_detail' => function ($query) {
            $query->orderBy('created_at');
        }])->where('from', $user_id)->first();
        return view('users.chat', ['kategori' => $kategori, 'pesan' => $pesan]);
    }

    public function ajaxPostChat(Request $request){
        $check = Pesan::where('from', $request->user_id)->first();
        if(!$check)
        $check = Pesan::create([
            'from' => $request->user_id,
            'to_role' => 3
        ]);
        
        $check->update([
            'updated_at' => date("Y-m-d H:i:s", strtotime('now')),
            'admin_read' => '0'
        ]);
        $pesans = PesanDetail::create([
            'pesan_id' => $check->id,
            'pesan' => $request->pesan,
            'admin_id' => null
        ]);
        
        return response()->json([
            'status' => 200,
        ]);
    }
}
