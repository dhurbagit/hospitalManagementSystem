<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipalitiesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $muniTyep = "INSERT INTO `municipalities_types` VALUES
        (1, 'महानगरपालिका', NULL, NULL),
        (2, 'उपमहानगरपालिका', NULL, NULL),
        (3, 'नगरपालिका', NULL, NULL),
        (4, 'गाउँपालिका', NULL, NULL)";

        // DB::select(DB::raw($muniTyep));
        DB::insert($muniTyep);
    }
}
