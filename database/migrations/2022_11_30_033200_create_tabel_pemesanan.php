<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->string('nama');
            $table->string('no_wa');
            $table->text('alamat');
            $table->enum('status', ['Belum Proses', 'Proses', 'Selesai']);
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
        Schema::dropIfExists('tabel_pemesanan');
    }
}
