<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'rf_kategories';
    public $timestamps = false;

    protected $fillable = [
        'kategori_name'
    ];

    public function sub_kategori(){
        return $this->hasMany('App\Models\SubKategori');
    }
}
