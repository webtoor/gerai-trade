<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaKabupaten;

class LokasiController extends Controller
{
    public function ajaxKotaKab($provinsi_id){
        $kotaKab = KotaKabupaten::where('province_id', $provinsi_id)->get();
        return response()->json(
           [ 'status' => '1',
            'data' => $kotaKab]
        );
    }

    public function ajaxKecamatan($kotaKab_id){
        $kotaKab = Kecamatan::where('province_id', $provinsi_id)->get();
        return response()->json(
           [ 'status' => '1',
            'data' => $kotaKab]
        );
    }
}
