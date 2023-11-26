<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',150)->unique();
            $table->string('nama_lengkap',128);
            $table->string('tempat_lahir',150);
            $table->date('tanggal_lahir');
            $table->string('email',150)->unique();
            $table->string('password',150);
            $table->string('foto',64);
            $table->longtext('alamat');
            $table->string('kodepos',8);
            $table->longtext('bio');
            $table->string('notelp',20);
            $table->enum('active',['1','0']);
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
        Schema::dropIfExists('users');
    }
}
