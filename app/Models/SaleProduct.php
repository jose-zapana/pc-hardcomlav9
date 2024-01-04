<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'quantity', 'unit_price'];

    public function sale()
    {
        $this->belongsTo('App\Models\Sale');
    }
}
