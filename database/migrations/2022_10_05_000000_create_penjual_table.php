<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjual', function (Blueprint $table) {
            $table->id();
            $table->string('email',150)->unique();
            $table->string('password',150);
            $table->string('nama',150);
            $table->string('nama_lengkap',128);
            $table->string('tempat_lahir',150);
            $table->date('tanggal_lahir');
            $table->longtext('alamat');
            $table->string('notelp',20);
            $table->string('foto',64);
            $table->string('kodepos',8);
            $table->longtext('bio');
            $table->enum('active',['1','0']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjual');
    }
}
