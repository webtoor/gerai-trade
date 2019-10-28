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
        'provinsi_id',
        'kota_kabupaten_id',
        'kecamatan_id',
        'kelurahan_desa_id'
    ];
}
