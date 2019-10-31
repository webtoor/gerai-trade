<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table = 'rf_subkategories';
    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'subkategori_name',
        'slug'
    ];


    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
}
