<?php

use Illuminate\Database\Seeder;

class BusinessCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_categories')->delete();
        
        \DB::table('business_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'General',
                'icon' => 'general.png',
                'tooltip' => 'Not sure what to pick, this guide will cover the basics of starting a business and is useful for anyone going into any type of business from Architecture Firms to a Xylophone Shop',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tradie',
                'icon' => 'tradie.png',
                'tooltip' => 'Looking to go into a trades based business such as an electrician, plumber or builder - select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Professional Services',
                'icon' => 'professional.png',
                'tooltip' => 'This includes accounting, graphic design, marketing and more sit down based businesses.',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Online Shop / E-commerce',
                'icon' => 'ecommerce.png',
                'tooltip' => 'Looking at opening an online shopping based business.',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:34',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hospitality',
                'icon' => 'hospitality.png',
                'tooltip' => 'This is for cafe’s, restaurants and bars.  Serving food? Select this option',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Retail',
                'icon' => 'retail.png',
                'tooltip' => 'Looking at opening a physical shop and selling things, select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:38:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sole Trader',
                'icon' => 'sole.png',
                'tooltip' => 'Going it alone perhaps as a consultant, freelancer or personal trainer, select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-07 10:39:01',
            ),
        ));
        
        
    }
}