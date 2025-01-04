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
        Schema::table('atmospheres', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->after('id');
            $table->double('pressure');
            $table->double('humidity');
            $table->double('visibility');
            $table->double('sea_level');
            $table->double('grnd_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atmospheres', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('pressure');
            $table->dropColumn('humidity');
            $table->dropColumn('visibility');
            $table->dropColumn('sea_level');
            $table->dropColumn('grnd_level');
        });
    }
};
