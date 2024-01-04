<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'cart_id', 'state', 'total', 'items', 'cash', 'change', 'status', 'method_payment_id',
        'method_shipping_id', 'customer_address_id'
    ];

    // TODO: Relaciones
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\MethodsPayment', 'method_payment_id');
    }

    public function shipping()
    {
        return $this->belongsTo('App\Models\MethodShipping', 'method_shipping_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\CustomerAddress', 'customer_address_id');
    }
}
