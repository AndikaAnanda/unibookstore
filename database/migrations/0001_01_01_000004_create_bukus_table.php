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
        Schema::create('bukus', function (Blueprint $table) {
            $table->string('id_buku', 10)->primary();
            $table->string('kategori', 50);
            $table->string('nama_buku', 100);
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->string('id_penerbit', 10);
            $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
