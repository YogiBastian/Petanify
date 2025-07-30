<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transfer_petani', function (Blueprint $table) {
            $table->renameColumn('bukti_transfer', 'foto_transfer');
        });
    }

    public function down(): void
    {
        Schema::table('transfer_petani', function (Blueprint $table) {
            $table->renameColumn('foto_transfer', 'bukti_transfer');
        });
    }
};

