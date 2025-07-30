<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Hapus foreign key constraint (jika ada)
            if (Schema::hasColumn('order_items', 'transfer_petani_id')) {
                $table->dropForeign(['transfer_petani_id']);
                $table->dropColumn('transfer_petani_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_petani_id')->nullable();

            // Jika perlu, tambahkan kembali foreign key (optional)
            // $table->foreign('transfer_petani_id')->references('id')->on('transfer_petani')->onDelete('set null');
        });
    }
};
