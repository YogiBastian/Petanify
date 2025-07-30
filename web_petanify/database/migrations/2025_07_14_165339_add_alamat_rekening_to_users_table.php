<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Informasi pengiriman
            $table->string('alamat', 255)->nullable()->after('role');
            $table->string('no_hp', 20)->nullable()->after('alamat');
            $table->string('kode_pos', 10)->nullable()->after('no_hp');
            $table->string('kota', 100)->nullable()->after('kode_pos');
            $table->string('provinsi', 100)->nullable()->after('kota');

            // Informasi rekening (untuk petani)
            $table->string('nama_bank', 100)->nullable()->after('provinsi');
            $table->string('no_rekening', 30)->nullable()->after('nama_bank');
            $table->string('nama_pemilik_rekening', 100)->nullable()->after('no_rekening');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'alamat',
                'no_hp',
                'kode_pos',
                'kota',
                'provinsi',
                'nama_bank',
                'no_rekening',
                'nama_pemilik_rekening',
            ]);
        });
    }
};
