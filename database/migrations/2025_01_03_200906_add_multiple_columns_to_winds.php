<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('winds', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->after('id');
            $table->double('speed');
            $table->double('deg');
            $table->double('gust');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('winds', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('speed');
            $table->dropColumn('deg');
            $table->dropColumn('gust');
        });
    }
};
