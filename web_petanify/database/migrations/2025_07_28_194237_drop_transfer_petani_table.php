<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('transfer_petani');
    }

    public function down(): void
    {
        // Jika ingin mengembalikan, tuliskan struktur tabel di sini (opsional)
    }
};

