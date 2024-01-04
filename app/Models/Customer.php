<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id', 'phone'];

    // TODO:Relaciones
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\CustomerAddress');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
