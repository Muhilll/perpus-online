<?php

use App\Models\pengembalian;
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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->increments('id_pengembalian');
            $table->integer('id_peminjaman');
            $table->datetime('tanggal_pengembalian')->default(pengembalian::raw('CURRENT_TIMESTAMP'));
            $table->integer('denda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
