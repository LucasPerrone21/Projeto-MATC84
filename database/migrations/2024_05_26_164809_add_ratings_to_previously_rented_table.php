<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('past_rent_movie_user_link', function (Blueprint $table) {
            // first, remove all rows from this table
            DB::table('past_rent_movie_user_link')->delete();
            // byte-size column for rating
            $table->tinyInteger('rating')->nullable();
            $table->unique(['user_id', 'movie_id'], 'NoDuplicates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('past_rent_movie_user_link', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropUnique('NoDuplicates');
        });
    }
};
