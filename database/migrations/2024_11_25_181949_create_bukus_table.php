<?php

use App\Models\buku;
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
            $table->increments('id_buku');
            $table->string('judul');
            $table->string('penulis');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->year('tahun_terbit');
            $table->integer('jumlah_ketersediaan');
            $table->datetime('tanggal_dibuat')->default(buku::raw('CURRENT_TIMESTAMP'));
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
