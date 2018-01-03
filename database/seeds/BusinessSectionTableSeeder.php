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
            ),
            1 => 
            array (
                'business_id' => 1,
                'section_id' => 2,
                'completed_percent' => 100,
            ),
            2 => 
            array (
                'business_id' => 1,
                'section_id' => 3,
                'completed_percent' => 100,
            ),
            3 => 
            array (
                'business_id' => 1,
                'section_id' => 4,
                'completed_percent' => 100,
            ),
            4 => 
            array (
                'business_id' => 1,
                'section_id' => 5,
                'completed_percent' => 50,
            ),
        ));
        
        
    }
}