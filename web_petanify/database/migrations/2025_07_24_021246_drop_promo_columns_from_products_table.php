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
        $table->dropColumn(['is_promo', 'promo_diskon', 'promo_expired_at']);
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->boolean('is_promo')->default(false);
        $table->integer('promo_diskon')->nullable();
        $table->timestamp('promo_expired_at')->nullable();
    });
}

};
