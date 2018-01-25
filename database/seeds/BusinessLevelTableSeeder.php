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
            3 => 
            array (
                'business_id' => 8,
                'level_id' => 1,
                'completed_percent' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'business_id' => 9,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'business_id' => 10,
                'level_id' => 1,
                'completed_percent' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'business_id' => 11,
                'level_id' => 1,
                'completed_percent' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'business_id' => 12,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'business_id' => 12,
                'level_id' => 2,
                'completed_percent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'business_id' => 13,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'business_id' => 13,
                'level_id' => 2,
                'completed_percent' => 67,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'business_id' => 14,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'business_id' => 14,
                'level_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'business_id' => 14,
                'level_id' => 3,
                'completed_percent' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'business_id' => 15,
                'level_id' => 1,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'business_id' => 15,
                'level_id' => 2,
                'completed_percent' => 100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'business_id' => 15,
                'level_id' => 3,
                'completed_percent' => 80,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}