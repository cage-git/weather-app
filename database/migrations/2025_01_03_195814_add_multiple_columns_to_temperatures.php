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
        Schema::table('temperatures', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->after('id');
            $table->double('temp');
            $table->double('feels_like');
            $table->double('min_temp');
            $table->double('max_temp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temperatures', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('temp');
            $table->dropColumn('feels_like');
            $table->dropColumn('min_temp');
            $table->dropColumn('max_temp');
        });
    }
};
