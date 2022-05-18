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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedTinyInteger('quantity')->default(1);
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->string('cartridge')->nullable();
            $table->string('battery')->nullable();
            $table->text('set')->nullable();
            $table->unsignedTinyInteger('trend')->default(0);
            $table->unsignedBigInteger('code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('description');
            $table->dropColumn('size');
            $table->dropColumn('cartridge');
            $table->dropColumn('battery');
            $table->dropColumn('set');
            $table->dropColumn('trend');
            $table->dropColumn('code');
        });
    }
};
