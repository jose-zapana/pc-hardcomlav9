<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['total', 'customer_id', 'shop_id', 'state'];

    // TODO: Relaciones
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'cart_products')->withPivot('product_id', 'quantity', 'unit_price');
    }

    public function sale()
    {
        return $this->hasOne('App\Models\Sale');
    }
}
