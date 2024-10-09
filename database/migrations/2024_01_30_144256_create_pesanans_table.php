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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained();
            $table->string('penerima');
            $table->text('alamat');
            $table->string('no_telp');
            $table->integer('jumlah_pembelian');
            $table->bigInteger('total');
            $table->enum('status', ['menunggu pembayaran','menunggu konfirmasi','ditolak', 'selesai'])->default('menunggu pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
