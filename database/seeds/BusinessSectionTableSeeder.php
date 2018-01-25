<?php

use Illuminate\Database\Seeder;

class BusinessSectionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_section')->delete();
        
        \DB::table('business_section')->insert(array (
            0 => 
            array (
                'business_id' => 1,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'business_id' => 1,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'business_id' => 1,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'business_id' => 1,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'business_id' => 1,
                'section_id' => 5,
                'completed_percent' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'business_id' => 7,
                'section_id' => 6,
                'completed_percent' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'business_id' => 8,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'business_id' => 8,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'business_id' => 9,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'business_id' => 9,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'business_id' => 9,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'business_id' => 9,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'business_id' => 10,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'business_id' => 10,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'business_id' => 11,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'business_id' => 11,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'business_id' => 11,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'business_id' => 12,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'business_id' => 12,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'business_id' => 12,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'business_id' => 12,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'business_id' => 12,
                'section_id' => 5,
                'completed_percent' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'business_id' => 13,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'business_id' => 13,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'business_id' => 13,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'business_id' => 13,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'business_id' => 13,
                'section_id' => 5,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'business_id' => 13,
                'section_id' => 6,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'business_id' => 13,
                'section_id' => 7,
                'completed_percent' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'business_id' => 14,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'business_id' => 14,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'business_id' => 14,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'business_id' => 14,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'business_id' => 14,
                'section_id' => 5,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'business_id' => 14,
                'section_id' => 6,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'business_id' => 14,
                'section_id' => 7,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'business_id' => 14,
                'section_id' => 8,
                'completed_percent' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'business_id' => 15,
                'section_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'business_id' => 15,
                'section_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'business_id' => 15,
                'section_id' => 3,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'business_id' => 15,
                'section_id' => 4,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'business_id' => 15,
                'section_id' => 5,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'business_id' => 15,
                'section_id' => 6,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'business_id' => 15,
                'section_id' => 7,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'business_id' => 15,
                'section_id' => 8,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'business_id' => 15,
                'section_id' => 9,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'business_id' => 15,
                'section_id' => 10,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'business_id' => 15,
                'section_id' => 11,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'business_id' => 15,
                'section_id' => 12,
                'completed_percent' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}