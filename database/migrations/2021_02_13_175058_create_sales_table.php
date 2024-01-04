<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->enum('state', ['checked', 'prepared', 'sent', 'confirmed']);
            $table->decimal('total', 10, 2);
            $table->integer('items');
            $table->decimal('cash', 10, 2);
            $table->decimal('change', 10, 2);
            $table->enum('status', ['PAID', 'PENDING', 'CANCELLED'])->default('PAID');

            $table->unsignedBigInteger('method_payment_id');
            $table->unsignedBigInteger('method_shipping_id');
            $table->unsignedBigInteger('customer_address_id');
            $table->foreign('cart_id')
                ->references('id')->on('carts');
            $table->foreign('method_payment_id')
                ->references('id')->on('method_payments');
            $table->foreign('method_shipping_id')
                ->references('id')->on('method_shippings');
            $table->foreign('customer_address_id')
                ->references('id')->on('customer_addresses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
