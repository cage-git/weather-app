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
        Schema::table('locations', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->after('id');
            $table->string('country')->after('city_id');
            $table->string('city')->after('country');
            $table->double('latitude')->after('city');
            $table->double('longitude')->after('latitude');
            $table->bigInteger('sunrise')->after('longitude');
            $table->bigInteger('sunset')->after('sunrise');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('sunrise');
            $table->dropColumn('sunset');
        });
    }
};
