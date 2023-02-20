<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTotalPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_total_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')->nullable()->references('id')->on('tabel_pemesanan');
            $table->integer('total');
            $table->biginteger('harga');
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
        Schema::dropIfExists('detail_total_pemesanan');
    }
}
