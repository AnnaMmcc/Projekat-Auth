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
        Schema::table('city_temperatures', function (Blueprint $table) {
            $table->dropColumn('city_id'); //Renameovala sam prethodno u city_id ali to nije bio ispravan nacin
                                                  // za resenje zadatka!

            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('city_temperatures', function (Blueprint $table) {
            //
        });
    }
};
