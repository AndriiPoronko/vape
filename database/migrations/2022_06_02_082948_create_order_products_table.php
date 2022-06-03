<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');

            $table->index('order_id', 'order_product_order_idx');
            $table->index('product_id', 'order_product_product_idx');

            $table->foreign('order_id', 'order_product_order_fk')->on('orders')->references('id');
            $table->foreign('product_id', 'order_product_product_fk')->on('products')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
