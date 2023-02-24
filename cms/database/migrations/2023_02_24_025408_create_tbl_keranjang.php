<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produk');
            $table->integer('qty');
            $table->enum('status_checkout', ['Tidak', 'Ya'])->default('Tidak');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('tbl_user')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('tbl_produk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_keranjang');
    }
}
