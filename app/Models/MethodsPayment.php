<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MethodsPayment extends Model
{
    use SoftDeletes;
    protected $table="method_payments";

    protected $fillable = ['name','image'];

    protected $dates = ['deleted_at'];

    public function sales()
    {
        $this->hasMany('App\Models\Sale');
    }

    public function method_shop()
    {
        return $this->belongsTo('App\Models\MethodsPayment_Shops');
    }
}
