<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('resi',100)->nullable();
            $table->string('gambar_resi',255)->nullable();
            $table->integer('province');
            $table->integer('regency');
            $table->string('courier',25);
            $table->string('courier_service',25)->nullable();
            $table->string('order_number',16);
            $table->string('order_status',55);
            $table->integer('pesanan_status');
            $table->datetime('order_date');
            $table->string('ongkir',24);
            $table->string('total_price')->nullable();
            $table->integer('total_items')->nullable();
            $table->integer('payment_method')->nullable();
            $table->text('delivery_data')->nullable();
            $table->string('link_pay',255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
