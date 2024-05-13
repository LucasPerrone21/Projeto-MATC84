<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('gender_movie');
            $table->timestamps();
            $table->binary('image')->nullable();
            $table->string('image_type')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
