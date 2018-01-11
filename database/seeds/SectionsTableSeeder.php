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
                'icon' => 'business-category.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'About You',
                'slug' => 'about-you',
                'icon' => 'about-you.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'Your Business Details',
                'slug' => 'your-business-details',
                'icon' => 'your-business-details.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 1,
                'name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'icon' => 'register-your-business.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Marketing',
                'slug'=> 'marketing',
                'icon' => 'marketing.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Operations',
                'slug' => 'operations',
                'icon' => 'operations.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 2,
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'finance.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Marketing',
                'slug' => 'marketing',
                'icon' => 'marketing.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Legal',
                'slug' => 'legal',
                'icon' => 'legal.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'icon' => 'human-resources.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Operations',
                'slug' => 'operations',
                'icon' => 'operations.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'level_id' => 3,
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'finance.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}