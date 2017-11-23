<?php

use Illuminate\Database\Seeder;

class BusinessOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_options')->delete();
        
        \DB::table('business_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_id' => 1,
                'parent_id' => NULL,
                'name' => 'Getting Started',
                'description' => NULL,
                'tooltip' => NULL,
                'content' => 'beginning',
                'weight' => NULL,
                'show_everywhere' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-11-23 01:58:45',
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => 4,
                'parent_id' => NULL,
                'name' => 'What industry is your business idea in',
                'description' => NULL,
                'tooltip' => NULL,
                'content' => 'shortcode for business category list',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => 4,
                'parent_id' => 2,
                'name' => 'General',
                'description' => NULL,
                'tooltip' => 'General category',
                'content' => 'Category',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:23:52',
                'updated_at' => '2017-11-23 01:23:52',
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => 4,
                'parent_id' => 2,
                'name' => 'Hospitality',
                'description' => NULL,
                'tooltip' => 'hospitality',
                'content' => 'hospitality',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:24:37',
                'updated_at' => '2017-11-23 01:24:37',
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => 4,
                'parent_id' => 2,
                'name' => 'Online Ecommerce',
                'description' => NULL,
                'tooltip' => 'online',
                'content' => 'online',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:25:14',
                'updated_at' => '2017-11-23 01:25:14',
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => 4,
                'parent_id' => 2,
                'name' => 'Solo Traders',
                'description' => NULL,
                'tooltip' => 'solo trader',
                'content' => 'solo trader',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:25:52',
                'updated_at' => '2017-11-23 01:25:52',
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => 5,
                'parent_id' => NULL,
                'name' => 'Great Now lets create your account',
                'description' => NULL,
                'tooltip' => 'create account',
                'content' => 'create account',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:28:17',
                'updated_at' => '2017-11-23 01:28:17',
            ),
            7 => 
            array (
                'id' => 8,
                'level_id' => 6,
                'parent_id' => NULL,
                'name' => 'So tell us about your business',
                'description' => NULL,
                'tooltip' => 'tell us about your business',
                'content' => 'tell us about your business',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:29:09',
                'updated_at' => '2017-11-23 01:29:09',
            ),
            8 => 
            array (
                'id' => 9,
                'level_id' => 7,
                'parent_id' => NULL,
                'name' => 'Register Your Business',
                'description' => NULL,
                'tooltip' => 'register your business',
                'content' => 'register your business',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:30:17',
                'updated_at' => '2017-11-23 01:30:17',
            ),
            9 => 
            array (
                'id' => 10,
                'level_id' => 2,
                'parent_id' => NULL,
                'name' => 'Which area of your business would you like to work on first?',
                'description' => NULL,
                'tooltip' => 'chooose category',
                'content' => 'choose cateogry
[shortcode on business option list]',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:46:02',
                'updated_at' => '2017-11-23 01:46:02',
            ),
            10 => 
            array (
                'id' => 11,
                'level_id' => 8,
                'parent_id' => NULL,
                'name' => 'Do you have a logo',
                'description' => NULL,
                'tooltip' => 'marketing',
                'content' => 'logo upload shortcode',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:49:28',
                'updated_at' => '2017-11-23 01:49:28',
            ),
            11 => 
            array (
                'id' => 12,
                'level_id' => 8,
                'parent_id' => 11,
                'name' => 'Enter your tagline',
                'description' => NULL,
                'tooltip' => 'enter your tagline',
                'content' => 'tagline enter shortcode',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:50:46',
                'updated_at' => '2017-11-23 03:17:16',
            ),
            12 => 
            array (
                'id' => 13,
                'level_id' => 8,
                'parent_id' => 12,
                'name' => 'Select Your Brand Color',
                'description' => NULL,
                'tooltip' => 'brand color',
                'content' => 'shortcode brand color',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:51:54',
                'updated_at' => '2017-11-23 03:17:52',
            ),
            13 => 
            array (
                'id' => 14,
                'level_id' => 8,
                'parent_id' => 13,
                'name' => 'Social Media Registration',
                'description' => NULL,
                'tooltip' => 'social',
                'content' => 'social media registration shortcode',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:52:43',
                'updated_at' => '2017-11-23 03:28:31',
            ),
            14 => 
            array (
                'id' => 15,
                'level_id' => 10,
                'parent_id' => NULL,
                'name' => 'Finance option',
                'description' => NULL,
                'tooltip' => 'finance option',
                'content' => 'yet to decide',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:55:03',
                'updated_at' => '2017-11-23 01:55:03',
            ),
            15 => 
            array (
                'id' => 16,
                'level_id' => 10,
                'parent_id' => NULL,
                'name' => 'Merchant Facilities',
                'description' => NULL,
                'tooltip' => 'merchant facilities',
                'content' => 'yet to decide',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:56:30',
                'updated_at' => '2017-11-23 01:56:30',
            ),
            16 => 
            array (
                'id' => 17,
                'level_id' => 3,
                'parent_id' => NULL,
                'name' => 'Which area of your business would you like to work on first?',
                'description' => NULL,
                'tooltip' => 'starting',
                'content' => 'shortcode to show business options',
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:57:34',
                'updated_at' => '2017-11-23 01:57:34',
            ),
            17 => 
            array (
                'id' => 18,
                'level_id' => 11,
                'parent_id' => NULL,
                'name' => 'SWOT',
                'description' => NULL,
                'tooltip' => 'swot',
                'content' => 'swot options',
                'weight' => 1,
                'show_everywhere' => 0,
                'created_at' => '2017-11-23 02:04:19',
                'updated_at' => '2017-11-23 02:04:19',
            ),
        ));
        
        
    }
}