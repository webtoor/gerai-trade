<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamats';
    public $timestamps = true;

    protected $fillable = [
        'alamat',
        'user_id',
        'jenis_alamat_id',
        'nama_penerima',
        'nohp_penerima',
        'province_id',
        'province_name',
        'city_id',
        'city_name',
        'kecamatan_id',
        'kecamatan_name',
        'kodepos'
    ];

   /*  public function provinsi(){
        return $this->hasOne('App\Models\Provinsi', 'id', 'provinsi_id');
    }
    public function kota_kabupatens(){
        return $this->hasOne('App\Models\KotaKabupaten', 'id', 'kota_kabupaten_id');
    }
    public function kecamatans(){
        return $this->hasOne('App\Models\Kecamatan', 'id', 'kecamatan_id');
    }
    public function kelurahan_desa(){
        return $this->hasOne('App\Models\KelurahanDesa', 'id', 'kelurahan_desa_id');
    } */
}
