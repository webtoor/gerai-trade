<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Produk extends Model
{   
    use Sluggable;

    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'hub_id',
        'kategori_id',
        'subkategori_id',
        'nama_produk',
        'slug',
        'deskripsi',
        'stok',
        'berat',
        'harga_dasar',
        'harga',
        'rating',
        'status',
        'link_tokped',
        'link_shopee',
        'link_bukalapak'
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

    public function produk_ulasan(){
        return $this->hasMany('App\Models\ProdukImage', 'produk_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'hub_id', 'id');
    }

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function subkategori(){
        return $this->belongsTo('App\Models\SubKategori');
    }

   /*  public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }
    public function getBuyableQyt($options = null) {
        return $this->qyt;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    } */

}
