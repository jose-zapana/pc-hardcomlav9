<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'phone'];

    protected $dates = ['delete_at'];

    // TODO: Faltan las relaciones
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\MethodsPayment');
    }

    public function shippings()
    {
        return $this->hasMany('App\Models\MethodShipping');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
