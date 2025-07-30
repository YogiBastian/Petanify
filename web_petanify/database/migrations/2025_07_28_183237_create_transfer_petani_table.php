<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transfer_petani', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petani_id');
            $table->bigInteger('total');
            $table->string('bulan', 7); // contoh '2025-07'
            $table->year('tahun');
            $table->date('tanggal_transfer')->nullable();
            $table->enum('status', ['pending', 'sukses', 'gagal'])->default('pending');
            $table->string('bukti_transfer')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('petani_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfer_petani');
    }
};
