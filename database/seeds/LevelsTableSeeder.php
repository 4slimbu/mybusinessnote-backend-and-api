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
            array (
                'id' => 1,
                'name' => 'Getting Started',
                'slug' => 'getting-started',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 2,
                'name' => 'Setting the Foundations',
                'slug' => 'setting-the-foundations',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'id' => 3,
                'name' => 'Building up a Business',
                'slug' => 'building-up-a-business',
                'icon' => 'badge_placeholder.jpg',
                'description' => NULL,
                'menu_order' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}