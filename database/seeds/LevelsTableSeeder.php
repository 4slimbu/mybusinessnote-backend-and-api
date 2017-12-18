<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'name' => 'Getting Started',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'Setting the Foundations',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'name' => 'Building up a Business',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'name' => 'Business Category',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'name' => 'About You',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 1,
                'name' => 'Your Business Details',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'name' => 'Register Your Business',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 2,
                'name' => 'Marketing',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 2,
                'name' => 'Operations',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 2,
                'name' => 'Finance',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 3,
                'name' => 'Marketing',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 3,
                'name' => 'Legal',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => 3,
                'name' => 'Human Resources',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => 3,
                'name' => 'Operations',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => 3,
                'name' => 'Finance',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}