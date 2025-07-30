<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Jika ada foreign key
            if (Schema::hasColumn('order_items', 'transfer_petani_id')) {
                try {
                    $table->dropForeign(['transfer_petani_id']);
                } catch (\Exception $e) {
                    // Tidak masalah jika constraint tidak ada
                }
                $table->dropColumn('transfer_petani_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_petani_id')->nullable();
            // $table->foreign('transfer_petani_id')->references('id')->on('transfer_petani')->onDelete('set null');
        });
    }
};
