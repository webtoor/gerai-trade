<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_role;
use App\Models\Provinsi;
use App\Models\KotaKabupaten;

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

        } catch (\Throwable $th) {
        }
    }

    public function showMitra(){
        try {
            $mitra = User_role::with('user')->where('role_id', '2')->get();
            $provinsi = Provinsi::all();
            return view('admin.dashboard.mitra', ['mitra' => $mitra, 'provinsi' => $provinsi]);

        } catch (\Throwable $th) {
            return $th;

        }
    }

    public function ajaxKotaKab($provinsi_id){
        $kotaKab = KotaKabupaten::where('province_id', $provinsi_id)->get();
        return response()->json(
           [ 'status' => '1',
            'data' => $kotaKab]
        );
    }
}
