<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetailPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('order_detail_po', function (Blueprint $table) {
            $table->id();
            $table->integer('id_orderpo');
            $table->string('nama_menu');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('total_harga');
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
        Schema::dropIfExists('order_detail_po');
    }
}
