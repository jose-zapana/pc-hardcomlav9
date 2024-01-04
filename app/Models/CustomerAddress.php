<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = ['customer_id', 'address', 'country', 'city', 'province'];

    // TODO: Relaciones
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }
}
