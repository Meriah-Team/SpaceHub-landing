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
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('instagram')->nullable();  // lowercase for consistency
            $table->string('tiktok')->nullable();     // lowercase for consistency
            $table->json('facilities')->nullable();
            $table->text('description')->nullable();  // added description field
            $table->string('city')->nullable();       // added city field
            $table->string('province')->nullable();   // added province field
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
