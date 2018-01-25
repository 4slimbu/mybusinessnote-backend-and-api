<?php

use Illuminate\Database\Seeder;

class BusinessLevelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_level')->delete();
        
        \DB::table('business_level')->insert(array (
            0 => 
            array (
                'business_id' => 1,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'business_id' => 1,
                'level_id' => 2,
                'completed_percent' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'business_id' => 7,
                'level_id' => 2,
                'completed_percent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}