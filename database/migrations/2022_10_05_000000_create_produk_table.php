<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->text('deskripsi_panjang');
            $table->text('deskripsi_pendek');
            $table->string('harga',200);
            $table->string('gambar',255);
            $table->string('kuantitas',25);
            $table->string('berat',255);
            $table->string('warna',255);
            $table->unsignedBigInteger('kategori');
            $table->integer('terbaik');
            $table->integer('status');
            $table->date('produk_date');
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
