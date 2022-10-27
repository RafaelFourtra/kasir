<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksipo', function (Blueprint $table) {
            $table->id();
            $table->integer('id_order');
            $table->integer('payment');
            $table->integer('returning_charge');
            $table->string('payment_method')->default('cash');
            $table->integer('user_id');
            $table->date('transaksi_date');
            $table->integer('transaksi_jumlah');
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
        Schema::dropIfExists('transaksipo');
    }
}
