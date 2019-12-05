<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\User_role;
use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\Kategori;
use App\Models\SubKategori;

class AdminController extends Controller
{
    public function index()
    {
        $member = User_role::where('role_id', '1')->get();
        $mitra = User_role::where('role_id', '2')->get();
        $reqMitra = User::with(['alamat' => function ($query) {
            $query->with('provinsi', 'kota_kabupatens', 'kecamatans', 'kelurahan_desa')->where(['jenis_alamat_id' => '1']);
        } ])->where(['status_mitra' => '2'])->get();
        return view('admin.dashboard.index', ['jumlah_member' => count($member), 'jumlah_mitra' => count($mitra), 'request_mitra' => $reqMitra]);
    }

    public function updateStatusMitra(Request $request){
        $user = User::findOrFail($request->user_id)->update([
            'status_mitra' => '1'
        ]);
        User_role::where('user_id', $request->user_id)->update([
            'role_id' => '2'
        ]);

        return back()->withSuccess(trans('Berhasil, user tersebut telah menjadi Mitra')); 

    }

    public function kelolaKategori(){
        $kategori = Kategori::all();
        $sub_kategori = SubKategori::with('kategori')->get();

        return view('admin.dashboard.kelolaKategori', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori]);

    }

    public function showMember(){
        try {
            $member = User_role::with('user')->where('role_id', '1')->get();
            return view('admin.dashboard.member', ['member' => $member]);

        } catch (\Exception $e) {
        }
    }

    public function showMitra(){
      
        try {
            $mitra = User_role::with(['user', 'alamat' => function ($query) {
                $query->where(['jenis_alamat_id' => '1']);
            } ])->where('role_id', '2')->OrderBy('id', 'desc')->get();
            $provinsi = province();
            return view('admin.dashboard.mitra', ['mitra' => $mitra, 'provinsi' => $provinsi]);

        } catch (\Exception $e) {

        }
    }

    public function addMitra(Request $request){
        $data = $request->validate([
            'nama_hub' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'nomor_ponsel' => ['required', 'string','min:10', 'max:14', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'alamat' => ['required'],
            'province_id' => ['required'],
            'province_name' => ['required'],
            'city_id' => ['required'],
            'city_name' => ['required'],
            'kecamatan_id' => ['required'],
            'kecamatan_name' => ['required'],
            'kodepos' => ['nullable']
        ]); 

        try {
            $result = User::create([
                'nama_hub' => $data['nama_hub'],
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status_mitra' => '1'
            ]);

            User_role::create([
                'user_id' => $result->id,
                'role_id' => '2'
            ]);

            Alamat::create([
                'alamat' => $data['alamat'],
                'user_id' => $result->id,
                'jenis_alamat_id' => '1',
                'province_id' => $data['province_id'],
                'province_name' => $data['province_name'],
                'city_id' => $data['city_id'],
                'city_name' => $data['city_name'],
                'kecamatan_id' => $data['kecamatan_id'],
                'kecamatan_name' => $data['kecamatan_name'],
                'kodepos' => $data['kodepos']
            ]);
            return back()->withSuccess(trans('Anda Berhasil menambahkan mitra')); 
        } catch (\Exception $e) {
            
        }
    }

    public function editHub($user_id){
       $hub = User::with('alamat')->where('id', $user_id)->first();
        /* return allcity(12) */;
        return view('admin.dashboard.editHub', ['hub' => $hub]);
    }

    public function updateHub(Request $request, $hub_id){
      $data = $request->validate([
            'nama_hub' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email,'.$hub_id ],
            'nomor_ponsel' => ['required', 'string','min:10', 'max:14', 'unique:users,nomor_ponsel,'.$hub_id ],
            'alamat' => ['required'],
            'alamat_id' => ['required'],
            'province_id' => ['required'],
            'province_name' => ['required'],
            'city_id' => ['required'],
            'city_name' => ['required'],
            'kecamatan_id' => ['required'],
            'kecamatan_name' => ['required'],
            'kodepos' => ['nullable']
        ]); 
        try {
            User::findOrFail($hub_id)->update([
                'nama_hub' => $data['nama_hub'],
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
            ]);
            Alamat::where(['id' => $data['alamat_id'],'user_id' => $hub_id, 'jenis_alamat_id' => '1'])->update([
                'alamat' => $data['alamat'],
                'province_id' => $data['province_id'],
                'province_name' => $data['province_name'],
                'city_id' => $data['city_id'],
                'city_name' => $data['city_name'],
                'kecamatan_id' => $data['kecamatan_id'],
                'kecamatan_name' => $data['kecamatan_name'],
                'kodepos' => $data['kodepos']
            ]);
            return redirect()->route('admin-panel.showMitra')->withSuccess(trans('Anda Berhasil mengedit Hub')); 
        } catch (\Throwable $th) {
        //throw $th;
        }
       

    }

    public function deleteMitra($user_id){
        return $user_id;
    }


}
