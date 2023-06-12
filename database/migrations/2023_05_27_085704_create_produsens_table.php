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
        Schema::create('produsens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produsen');
            $table->string('no_seluler');
            $table->string('no_telp_wa');
            $table->string('alamat_produsen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produsens');
    }
};
