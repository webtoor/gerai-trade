<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{   
    use Sluggable;

    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'mitra_id',
        'kategori_id',
        'subkategori_id',
        'nama_produk',
        'slug',
        'deskripsi',
        'stok',
        'harga',
        'rating'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nama_produk'
            ]
        ];
    }

    public function produk_image(){
        return $this->hasMany('App\Models\ProdukImage', 'product_id', 'id');
    }

}
