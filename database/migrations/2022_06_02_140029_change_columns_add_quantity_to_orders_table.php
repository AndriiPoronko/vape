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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment')->change();
            $table->string('delivery')->change();
            $table->string('phone_number')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->unsignedSmallInteger('payment')->change();
            $table->integer('phone_number')->change();
            $table->unsignedSmallInteger('delivery')->change();
        });
    }
};
