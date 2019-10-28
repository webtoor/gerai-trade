<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    protected $table = 'user_roles';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'role_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function alamat(){
        return $this->hasOne('App\Models\Alamat', 'user_id', 'user_id');
    }
   
}
