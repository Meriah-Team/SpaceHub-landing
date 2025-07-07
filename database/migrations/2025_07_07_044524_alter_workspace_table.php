<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\TextType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('workspaces', function (Blueprint $table) {
            // Mengubah kolom maps dari string/varchar menjadi text untuk link Google Maps yang panjang
            $table->text('maps')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workspaces', function (Blueprint $table) {
            // Mengembalikan kolom maps ke string/varchar dengan panjang default
            $table->string('maps')->nullable()->change();
        });
    }
};
