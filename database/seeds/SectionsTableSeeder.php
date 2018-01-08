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
                'level_id' => 1,
                'name' => 'Business Category',
                'slug' => 'business-category',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'About You',
                'slug' => 'about-you',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'Your Business Details',
                'slug' => 'your-business-details',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Marketing',
                'slug'=> 'marketing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Operations',
                'slug' => 'operations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Finance',
                'slug' => 'finance',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Marketing',
                'slug' => 'marketing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Legal',
                'slug' => 'legal',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Operations',
                'slug' => 'operations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Finance',
                'slug' => 'finance',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}