<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("poster_path");
            $table->string("vote_average");
            $table->string("release_date");
            $table->integer("id_api");
            $table->timestamps();
        });

        DB::statement('ALTER TABLE movies ADD CONSTRAINT max_movies CHECK (COUNT(*) <= 20)');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
