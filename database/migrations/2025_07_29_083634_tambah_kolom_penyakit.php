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
        Schema::table('pasiens', function (Blueprint $table) {
            $table->enum('penyakit', ['Sakit mata', 'Sakit telinga', 'Sakit gigi'])->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            if (Schema::hasColumn('pasiens', 'penyakit', 'dokter')) {
                $table->dropColumn('penyakit');
            }
        });
    }
};
