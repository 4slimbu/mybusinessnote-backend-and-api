<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            array (
                'id' => 1,
                'level_id' => 1,
                'name' => 'Business Category',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 2,
                'level_id' => 1,
                'name' => 'About You',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 3,
                'level_id' => 1,
                'name' => 'Your Business Details',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 4,
                'level_id' => 1,
                'name' => 'Register Your Business',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 5,
                'level_id' => 2,
                'name' => 'Marketing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 6,
                'level_id' => 2,
                'name' => 'Operations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 7,
                'level_id' => 2,
                'name' => 'Finance',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 8,
                'level_id' => 3,
                'name' => 'Marketing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 9,
                'level_id' => 3,
                'name' => 'Legal',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 10,
                'level_id' => 3,
                'name' => 'Human Resources',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 11,
                'level_id' => 3,
                'name' => 'Operations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 12,
                'level_id' => 3,
                'name' => 'Finance',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}