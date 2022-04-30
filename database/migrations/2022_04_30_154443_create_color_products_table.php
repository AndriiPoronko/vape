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
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('product_id');

            $table->index('color_id', 'color_product_color_idx');
            $table->index('product_id', 'color_product_product_idx');

            $table->foreign('color_id', 'color_product_color_fk')->on('colors')->references('id');
            $table->foreign('product_id', 'color_product_product_fk')->on('products')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_products');
    }
};
