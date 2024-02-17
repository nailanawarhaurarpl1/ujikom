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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_user')->unsigned()->nullable();
            // $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama');
            $table->integer('jumlah_pemasukan'); // Changed column name to use underscore
            // Adding a date column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
