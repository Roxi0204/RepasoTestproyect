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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('password');
            $table->string('bio')->nullable()->after('avatar');
            $table->string('website')->nullable()->after('bio');
            $table->string('location')->nullable()->after('website');
    }
    );

       
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
