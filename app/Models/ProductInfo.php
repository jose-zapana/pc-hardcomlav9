<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $fillable = ['product_id', 'specification', 'content'];

    // TODO: Relaciones
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
