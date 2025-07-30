<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transfer_petani', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petani_id');
            $table->decimal('nominal', 15, 2);
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
