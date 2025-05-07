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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
                $table->string('title')->nullable();
                $table->string('artist')->nullable();
                $table->string('genre')->nullable();
                $table->integer('year')->nullable();
                $table->string('cover_image')->nullable();
            });
        
    }

    /**p
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
