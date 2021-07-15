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
                'icon' => 'RuQRlMty0mv7XYnoMibSs1pFaUwFxzku.png',
                'hover_icon' => 'yqi760bTXcJq1zXN4qtQuhfJT2I62sre.png',
                'tooltip' => 'Not sure what to pick, this guide will cover the basics of starting a business and is useful for anyone going into any type of business from Architecture Firms to a Xylophone Shop',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:09:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tradie',
                'icon' => '0xuhOn1zMx3MdPuYG4DJtugm8e7f4DMM.png',
                'hover_icon' => 'bNnDS7ESeJ34iaivU0M4QkzFXiOzHQ9X.png',
                'tooltip' => 'Looking to go into a trades based business such as an electrician, plumber or builder - select this option.',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:10:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Professional Services',
                'icon' => 'IAgn6REGor4ozLUE6y8GZEam83z8pK4h.png',
                'hover_icon' => 'YaDSXsgVCuu2GR3guIsgrlnZWeAbrn0V.png',
                'tooltip' => 'This includes accounting, graphic design, marketing and more sit down based businesses.',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:10:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Online Shop / E-commerce',
                'icon' => 'yHBuaRbC7Ihvi1jPYpcE8zOgap50foJJ.png',
                'hover_icon' => 'sanRovRYCeVshQPJPoZNySG0OrRp4OS6.png',
                'tooltip' => 'Looking at opening an online shopping based business.',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:10:55',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hospitality',
                'icon' => 'qKSx5YgldjK4n2uQvASwGXn9caSh1oyI.png',
                'hover_icon' => 'WWxQztOUHYFKT0ZiRG3kqouMfIPbnChJ.png',
                'tooltip' => 'This is for cafe’s, restaurants and bars.  Serving food? Select this option',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:11:15',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Retail',
                'icon' => '5SsPseWR7b1gCF8WxCfaLQZ7FoAQDO8Q.png',
                'hover_icon' => 'Hdz1WLSSDvsERFnqpeFphDXnfobCuUNZ.png',
                'tooltip' => 'Looking at opening a physical shop and selling things, select this option.',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:11:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sole Trader',
                'icon' => 'b1rDjceSdIMDYMxIPyNnm68UZLXNtGpt.png',
                'hover_icon' => '3jKfe1Dm9s2n34rxJh7yvZ8RrgP6KFQb.png',
                'tooltip' => 'Going it alone perhaps as a consultant, freelancer or personal trainer, select this option.',
                'created_at' => NULL,
                'updated_at' => '2021-07-15 09:11:56',
            ),
        ));
        
        
    }
}