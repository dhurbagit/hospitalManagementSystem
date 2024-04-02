<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $rows = [

            [
                'nepali_name' => 'प्रदेश नं. १',
                'english_name' => 'Province No. 1',
            ],
            [
                'nepali_name' => 'मधेश प्रदेश',
                'english_name' => 'Madhesh',
            ],
            [
                'nepali_name' => 'बााग्मती प्रदेश',
                'english_name' => 'Bagmati',
            ],
            [
                'nepali_name' => 'गण्डकी प्रदेश',
                'english_name' => 'Gandaki',
            ],
            [
                'nepali_name' => 'लुम्बिनि प्रदेश',
                'english_name' => 'Lumbini',
            ],
            [
                'nepali_name' => 'कर्णाली प्रदेश',
                'english_name' => 'Karnali',
            ],
            [
                'nepali_name' => 'सुदुरपश्चिम प्रदेश',
                'english_name' => 'Sudurpaschim',
            ]
        ];
        DB::table('provinces')->insert($rows);
    }
}
