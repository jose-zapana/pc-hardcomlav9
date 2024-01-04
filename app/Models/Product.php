<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'unit_price', 'shop_id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    // TODO: Relaciones
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function infos()
    {
        return $this->hasMany('App\Models\ProductInfo');
    }

    public function carts()
    {
        return $this->belongsToMany('App\Models\Cart', 'cart_products')->withPivot('cart_id', 'quantity', 'unit_price');
    }

    public function sales()
    {
        return $this->belongsToMany('App\Models\Sale', 'sale_products')->withPivot('sale_id', 'quantity', 'unit_price');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function top()
    {
        return $this->hasOne('App\Models\ProductTop');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_products')->withPivot('category_id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
