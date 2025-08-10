<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('days')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $days = [
            'senin',
            'selasa',
            'rabu',
            'kamis',
            'jumat',
            'sabtu',
            'minggu',
        ];

        foreach ($days as $day) {
            Day::create([
                'hari' => $day
            ]);
        };
    }
}
