<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('promo_diskon', 12, 2)->nullable()->after('is_promo');
            // Jika ingin nilai tidak boleh minus:
            // $table->decimal('promo_diskon', 12, 2)->unsigned()->nullable()->after('is_promo');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('promo_diskon');
            // $table->dropColumn('promo_percentage');
        });
    }

};
