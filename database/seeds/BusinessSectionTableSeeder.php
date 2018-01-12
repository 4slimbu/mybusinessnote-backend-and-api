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
        ));
        
        
    }
}