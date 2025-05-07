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
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('phone');
            $table->string('maps')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->json('facilities')->nullable();
            $table->text('description')->nullable(); 
            $table->text('cover_image')->nullable(); 
            $table->json('description_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspaces');  // Fixed table name in drop statement
    }
};
