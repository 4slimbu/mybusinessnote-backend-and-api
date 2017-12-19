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
                'section_id' => 1,
                'parent_id' => NULL,
                'name' => 'Getting Started',
                'description' => NULL,
                'tooltip' => NULL,
                'content' => 'beginning',
                'menu_order' => 1,
                'weight' => NULL,
                'show_everywhere' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-11-23 01:58:45',
            ),
            1 => 
            array (
                'id' => 2,
                'section_id' => 1,
                'parent_id' => NULL,
                'name' => 'What industry is your business idea in',
                'description' => NULL,
                'tooltip' => NULL,
                'content' => 'shortcode for business category list',
                'menu_order' => 2,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'section_id' => 1,
                'parent_id' => 2,
                'name' => 'General',
                'description' => NULL,
                'tooltip' => 'General category',
                'content' => 'Category',
                'menu_order' => 3,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:23:52',
                'updated_at' => '2017-11-23 01:23:52',
            ),
            3 => 
            array (
                'id' => 4,
                'section_id' => 1,
                'parent_id' => 2,
                'name' => 'Hospitality',
                'description' => NULL,
                'tooltip' => 'hospitality',
                'content' => 'hospitality',
                'menu_order' => 4,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:24:37',
                'updated_at' => '2017-11-23 01:24:37',
            ),
            4 => 
            array (
                'id' => 5,
                'section_id' => 1,
                'parent_id' => 2,
                'name' => 'Online Ecommerce',
                'description' => NULL,
                'tooltip' => 'online',
                'content' => 'online',
                'menu_order' => 5,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:25:14',
                'updated_at' => '2017-11-23 01:25:14',
            ),
            5 => 
            array (
                'id' => 6,
                'section_id' => 1,
                'parent_id' => 2,
                'name' => 'Solo Traders',
                'description' => NULL,
                'tooltip' => 'solo trader',
                'content' => 'solo trader',
                'menu_order' => 6,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:25:52',
                'updated_at' => '2017-11-23 01:25:52',
            ),
            6 => 
            array (
                'id' => 7,
                'section_id' => 2,
                'parent_id' => NULL,
                'name' => 'Great Now lets create your account',
                'description' => NULL,
                'tooltip' => 'create account',
                'content' => 'create account',
                'menu_order' => 7,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:28:17',
                'updated_at' => '2017-11-23 01:28:17',
            ),
            7 => 
            array (
                'id' => 8,
                'section_id' => 3,
                'parent_id' => NULL,
                'name' => 'So tell us about your business',
                'description' => NULL,
                'tooltip' => 'tell us about your business',
                'content' => 'tell us about your business',
                'menu_order' => 8,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:29:09',
                'updated_at' => '2017-11-23 01:29:09',
            ),
            8 => 
            array (
                'id' => 9,
                'section_id' => 4,
                'parent_id' => NULL,
                'name' => 'Register Your Business',
                'description' => NULL,
                'tooltip' => 'register your business',
                'content' => 'register your business',
                'menu_order' => 9,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:30:17',
                'updated_at' => '2017-11-23 01:30:17',
            ),
            9 => 
            array (
                'id' => 10,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Which area of your business would you like to work on first?',
                'description' => NULL,
                'tooltip' => 'chooose category',
                'content' => 'choose cateogry
[shortcode on business option list]',
                'menu_order' => 10,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:46:02',
                'updated_at' => '2017-11-23 01:46:02',
            ),
            10 => 
            array (
                'id' => 11,
                'section_id' => 5,
                'parent_id' => NULL,
                'name' => 'Do you have a logo',
                'description' => NULL,
                'tooltip' => 'marketing',
                'content' => 'logo upload shortcode',
                'menu_order' => 11,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:49:28',
                'updated_at' => '2017-11-23 01:49:28',
            ),
            11 => 
            array (
                'id' => 12,
                'section_id' => 5,
                'parent_id' => 11,
                'name' => 'Enter your tagline',
                'description' => NULL,
                'tooltip' => 'enter your tagline',
                'content' => 'tagline enter shortcode',
                'menu_order' => 12,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:50:46',
                'updated_at' => '2017-11-23 03:17:16',
            ),
            12 => 
            array (
                'id' => 13,
                'section_id' => 5,
                'parent_id' => 12,
                'name' => 'Select Your Brand Color',
                'description' => NULL,
                'tooltip' => 'brand color',
                'content' => 'shortcode brand color',
                'menu_order' => 13,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:51:54',
                'updated_at' => '2017-11-23 03:17:52',
            ),
            13 => 
            array (
                'id' => 14,
                'section_id' => 5,
                'parent_id' => 13,
                'name' => 'Social Media Registration',
                'description' => NULL,
                'tooltip' => 'social',
                'content' => 'social media registration shortcode',
                'menu_order' => 14,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:52:43',
                'updated_at' => '2017-11-23 03:28:31',
            ),
            14 => 
            array (
                'id' => 15,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Finance option',
                'description' => NULL,
                'tooltip' => 'finance option',
                'content' => 'yet to decide',
                'menu_order' => 15,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:55:03',
                'updated_at' => '2017-11-23 01:55:03',
            ),
            15 => 
            array (
                'id' => 16,
                'section_id' => 6,
                'parent_id' => NULL,
                'name' => 'Merchant Facilities',
                'description' => NULL,
                'tooltip' => 'merchant facilities',
                'content' => 'yet to decide',
                'menu_order' => 16,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:56:30',
                'updated_at' => '2017-11-23 01:56:30',
            ),
            16 => 
            array (
                'id' => 17,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'Which area of your business would you like to work on first?',
                'description' => NULL,
                'tooltip' => 'starting',
                'content' => 'shortcode to show business options',
                'menu_order' => 17,
                'weight' => 1,
                'show_everywhere' => 1,
                'created_at' => '2017-11-23 01:57:34',
                'updated_at' => '2017-11-23 01:57:34',
            ),
            17 => 
            array (
                'id' => 18,
                'section_id' => 7,
                'parent_id' => NULL,
                'name' => 'SWOT',
                'description' => NULL,
                'tooltip' => 'swot',
                'content' => 'swot options',
                'menu_order' => 18,
                'weight' => 1,
                'show_everywhere' => 0,
                'created_at' => '2017-11-23 02:04:19',
                'updated_at' => '2017-11-23 02:04:19',
            ),
        ));
        
        
    }
}