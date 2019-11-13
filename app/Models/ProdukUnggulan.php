<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUnggulan extends Model
{
    protected $table = 'product_unggulans';
    public $timestamps = false;

    protected $fillable = [
        'product_id'
    ];

    public function produk(){
        return $this->belongsTo('App\Models\Produk', 'product_id', 'id');
    }
}
