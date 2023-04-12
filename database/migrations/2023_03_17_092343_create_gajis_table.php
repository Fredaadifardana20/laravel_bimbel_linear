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
        Schema::create('gajis', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_admin');
            $table->integer('jumlah_gaji');
            $table->dateTime('tanggal_gaji');
            $table->enum('tipe', ['Tunai', 'Transfer']);
            $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar']);
            $table->string('no_rekening')->nullable();
            $table->timestamps();
        });
        Schema::table('gajis', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gajis', function (Blueprint $table) {
            $table->dropForeign('gajis_id_admin_foreign');
        });
        Schema::dropIfExists('gajis');
    }
};
