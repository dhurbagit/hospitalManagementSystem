<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('districts')->truncate();
        $districts = "INSERT INTO `districts` VALUES
        (1, 1, '1', 'ताप्लेजुङ', 'Taplejung', NULL, NULL),
        (2, 1, '2', 'पाचथर', 'Panchthar', NULL , NULL),
        (3, 1, '3', 'ईलाम', 'Ilam', NULL, NULL),
        (4, 1, '4', 'झापा', 'Jhapa', NULL, NULL),
        (5, 1, '5', 'मोरङ', 'Morang', NULL, NULL),
        (6, 1, '6', 'सुनसरि', 'Sunsari', NULL, NULL),
        (7, 1, '7', 'धनकुटा', 'Dhankuta', NULL, NULL),
        (8, 1, '8', 'तेह्थुम', 'Terhathum', NULL, NULL),
        (9, 1, '9', 'संखुवासभा', 'Sankhuwasabha', NULL, NULL),
        (10, 1, '10', 'भोजपुर', 'Bhojpur', NULL, NULL),
        (11, 1, '11', 'सोलुखुम्बु', 'Solukhumbu', NULL, NULL),
        (12, 1, '12', 'ओखलढुङ्गा', 'Okhaldhunga', NULL, NULL),
        (13, 1, '13', 'खोटाङ', 'Khotang', NULL, NULL),
        (14, 1, '14', 'उदयपुर', 'Udayapur', NULL, NULL),
        (15, 2, '15', 'सप्तरी', 'Saptari', NULL, NULL),
        (16, 2, '16', 'सिरहा', 'Siraha', NULL, NULL),
        (17, 2, '17', 'धनुषा', 'Dhanusa', NULL, NULL),
        (18, 2, '18', 'महोत्तरी', 'Mahottari', NULL, NULL),
        (19, 2, '19', 'सर्लाहि', 'Sarlahi', NULL, NULL),
        (20, 3, '20', 'सिन्धुली', 'Sindhuli', NULL, NULL),
        (21, 3, '21', 'रामेछाप', 'Ramechhap', NULL, NULL),
        (22, 3, '22', 'दोलखा', 'Dolakha', NULL, NULL),
        (23, 3, '23', 'सिन्धुपाल्चोक', 'Sindhupalchok', NULL, NULL),
        (24, 3, '24', 'काभ्रे', 'Kavre', NULL, NULL),
        (25, 3, '25', 'ललितपुर', 'Lalitpur',NULL, NULL),
        (26, 3, '26', 'भक्तपुर', 'Bhaktapur', NULL, NULL),
        (27, 3, '27', 'काठमाण्डौ', 'Kathmandu', NULL, NULL),
        (28, 3, '28', 'नुवाकोट', 'Nuwakot', NULL, NULL),
        (29, 3, '29', 'रसुवा', 'Rasuwa', NULL, NULL),
        (30, 3, '30', 'धादिङ', 'Dhading', NULL, NULL),
        (31, 3, '31', 'मकवानपुर', 'Makwanpur', NULL, NULL),
        (32, 2, '32', 'रौतहट', 'Rautahat', NULL, NULL),
        (33, 2, '33', 'बारा', 'Bara', NULL, NULL),
        (34, 2, '34', 'पर्सा', 'Parsa', NULL, NULL),
        (35, 3, '35', 'चितवन', 'Chitawan', NULL, NULL),
        (36, 4, '36', 'गोरखा', 'Gorkha', NULL, NULL),
        (37, 4, '37', 'लम्जुङ', 'Lamjung', NULL, NULL),
        (38, 4, '39', 'तनहुं', 'Tanahu', NULL, NULL),
        (39, 4, '41', 'स्याङ्जा', 'Syangja', NULL, NULL),
        (40, 4, '40', 'कास्की', 'Kaski', NULL, NULL),
        (41, 4, '41', 'मनाङ', 'Manang', NULL, NULL),
        (42, 4, '42', 'मुस्ताङ्ग', 'Mustang', NULL, NULL),
        (43, 4, '43', 'म्यागदि', 'Myagdi', NULL, NULL),
        (44, 4, '44', 'पर्वत', 'Parbat', NULL, NULL),
        (45, 4, '45', 'बाग्लुङ्ग', 'Baglung', NULL, NULL),
        (46, 5, '46', 'गुल्मी', 'Gulmi', NULL, NULL),
        (47, 5, '47', 'पाल्पा', 'Palpa', NULL, NULL),
        (48, 5, '48', 'नवलपुर', 'Nawalparasi', NULL, NULL),
        (49, 5, '49', 'रुपन्देही', 'Rupandehi', NULL, NULL),
        (50, 5, '50', 'कपिलवस्तु', 'Kapilbastu', NULL, NULL),
        (51, 5, '51', 'अर्घाखाँची', 'Arghakhanchi', NULL, NULL),
        (52, 5, '52', 'प्यूठान', 'Pyuthan', NULL, NULL),
        (53, 5, '53', 'रोल्पा', 'Rolpa', NULL, NULL),
        (54, 6, '54', 'रुकुम', 'Rukum', NULL, NULL),
        (55, 6, '55', 'सल्यान', 'Salyan', NULL, NULL),
        (56, 5, '56', 'दाङ्ग', 'Dang', NULL, NULL),
        (57, 5, '57', 'बाँके', 'Banke', NULL, NULL),
        (58, 5, '58', 'बर्दिया', 'Bardiya', NULL, NULL),
        (59, 6, '59', 'सुर्खेत', 'Surkhet', NULL, NULL),
        (60, 6, '60', 'दैलेख', 'Dailekh', NULL, NULL),
        (61, 6, '61', 'जाजरकोट', 'Jajarkot', NULL, NULL),
        (62, 6, '62', 'डोल्पा', 'Dolpa', NULL, NULL),
        (63, 6, '63', 'जुम्ला', 'Jumla', NULL, NULL),
        (64, 6, '64', 'कालिकोट', 'Kalikot', NULL, NULL),
        (65, 6, '65', 'मुगु', 'Mugu', NULL, NULL),
        (66, 6, '66', 'हुम्ला', 'Humla', NULL, NULL),
        (67, 7, '67', 'बाजुरा', 'Bajura', NULL, NULL),
        (68, 7, '68', 'बझाङ्ग', 'Bajhang', NULL, NULL),
        (69, 7, '69', 'अछाम', 'Achham', NULL, NULL),
        (70, 7, '70', 'डोटी', 'Doti', NULL, NULL),
        (71, 7, '71', 'कैलाली', 'Kailali', NULL, NULL),
        (72, 7, '72', 'कंचनपुर', 'Kanchanpur', NULL, NULL),
        (73, 7, '73', 'डडेलधुरा', 'Dadeldhura', NULL, NULL),
        (74, 7, '74', 'बैतडि', 'Baitadi', NULL, NULL),
        (75, 7, '75', 'दार्चुला', 'Darchaula', NULL, NULL),
        (76, 5, '76', 'पुर्वि रुकुम','Rukum East' ,NULL, NULL),
        (77, 5, '77', 'नवलपुर', 'Nawalpur' ,NULL, NULL)";

        // dd($districts);
        // DB::select(DB::raw($districts));
        DB::insert($districts);
    }
}
