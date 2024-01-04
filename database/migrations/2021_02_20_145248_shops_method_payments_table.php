<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopsMethodPaymentsTable extends Migration
{
   
    public function up()
    {
        Schema::create('shops_method_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')->on('shops');
            $table->unsignedBigInteger('method_payments_id');
            $table->foreign('method_payments_id')
                ->references('id')->on('method_payments');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('shops_method_payments');
    }
}
