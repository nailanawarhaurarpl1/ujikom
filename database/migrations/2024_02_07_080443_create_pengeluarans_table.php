<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_user')->unsigned()->nullable();
            // $table->foreign('id_user')->references('id')->on('users');
            $table->bigInteger('id_kategori')->unsigned()->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->string('keterangan');
            $table->integer('jumlah_pengeluaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
