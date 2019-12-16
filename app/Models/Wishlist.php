<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = [
        'user_id',
        'produk_id',
        'created_at',
        'updated_at'
    ];

    public function produk(){
        return $this->belongsTo('App\Models\Produk', 'produk_id', 'id');
    }
}
