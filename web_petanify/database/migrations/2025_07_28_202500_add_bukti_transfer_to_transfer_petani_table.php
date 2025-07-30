<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transfer_petani', function (Blueprint $table) {
            $table->string('bukti_transfer')->nullable()->after('nominal');
        });
    }

    public function down(): void
    {
        Schema::table('transfer_petani', function (Blueprint $table) {
            $table->dropColumn('bukti_transfer');
        });
    }
};
