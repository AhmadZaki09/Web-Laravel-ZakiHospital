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
        Schema::create('niks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_nik', 100)->unique();
            $table->timestamps();

            $table->foreignId('pasien_id')->constrained('pasiens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niks');
    }
};
