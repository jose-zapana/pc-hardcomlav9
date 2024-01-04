<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MethodShipping extends Model
{

    protected $fillable = ['name', 'image', 'shop_id'];

    // TODO: Relaciones
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
     
    public function sales()
    {
        $this->hasMany('App\Models\Sale');
    }
}
