<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('departments')->insert([
            'dept_name'=> 'admin',
            'dept_code' => 'JUJ09K12',
            'dept_description'=> 'hi love you',
            

        ]);
    }
}
