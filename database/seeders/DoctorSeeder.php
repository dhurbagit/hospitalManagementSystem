<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('doctors')->insert([
            'first_name' => 'dhurba',
            'middle_name' => '-',
            'last_name' => 'dhakal',
            'license_no' => '123456254',
            'country' => 'nepal',
            'province' => 'Bagmati',
            'district' => 'kathmandu',
            'municipality' => 'tha chanina',
            'address' => 'maitidevi',
            'ward_no' => '29',
            'gender' => 'male',
            'date_of_bith_ad' => '2050-02-02',
            'date_of_bith_bs' => '2012-02-25',
            'image' => '',
            'dept_id' => '1',
            
        ]);
    }
}
