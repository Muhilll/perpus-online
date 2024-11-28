<?php

use App\Models\peminjaman;
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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->integer('id_anggota');
            $table->integer('id_buku');
            $table->datetime('tanggal_pinjam')->default(peminjaman::raw('CURRENT_TIMESTAMP'));
            $table->date('tanggal_jatuh_tempo');
            $table->boolean('dikembalikan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
