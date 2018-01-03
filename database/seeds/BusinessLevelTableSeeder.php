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
            ),
            1 => 
            array (
                'business_id' => 1,
                'level_id' => 2,
                'completed_percent' => 50,
            ),
        ));
        
        
    }
}