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
        Schema::table('dokters', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('specialis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            if (Schema::hasColumn('dokters', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });
    }
};
