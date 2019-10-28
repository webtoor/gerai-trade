<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\User_role;
use App\Models\Provinsi;
use App\Models\Alamat;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
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
            $mitra = User_role::with('user')->where('role_id', '2')->get();
            $provinsi = Provinsi::all();
            return view('admin.dashboard.mitra', ['mitra' => $mitra, 'provinsi' => $provinsi]);

        } catch (\Exception $e) {

        }
    }

    public function addMitra(Request $request){
        $data = $request->validate([
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'nomor_ponsel' => ['required', 'string','min:11', 'max:14', 'unique:users'],
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'kota_kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan_desa' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]); 

        try {
            $result = User::create([
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            User_role::create([
                'user_id' => $result->id,
                'role_id' => '2'
            ]);

            Alamat::create([
                'alamat' => $data['alamat'],
                'user_id' => $result->id,
                'jenis_alamat_id' => '1',
                'provinsi_id' => $data['provinsi'],
                'kota_kabupaten_id' => $data['kota_kabupaten'],
                'kecamatan_id' => $data['kecamatan'],
                'kelurahan_desa_id' => $data['kelurahan_desa']
            ]);
        } catch (\Exception $e) {
            
        }
    }


}
