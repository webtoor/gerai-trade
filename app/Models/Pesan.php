<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesans';
    protected $fillable = [
        'from',
        'to_role',
        'admin_read',
        'created_at',
        'updated_at'
    ];

    public function pesan_detail(){
        return $this->hasMany('App\Models\PesanDetail', 'pesan_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'from', 'id');
    }

}
