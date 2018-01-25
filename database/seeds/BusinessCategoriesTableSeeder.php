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
                'icon' => 'PhJWJyfji6dHeAXCAntBW2J0PvP7mlHq.png',
                'hover_icon' => 'jnKs1HIgJzmsQulF6t4hNJvtBOPMzHJK.png',
                'tooltip' => 'Not sure what to pick, this guide will cover the basics of starting a business and is useful for anyone going into any type of business from Architecture Firms to a Xylophone Shop',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:29:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tradie',
                'icon' => 'RtfUfo7EOKp83RYr0k8gBHeY7UGOMd8u.png',
                'hover_icon' => 'h7d0qLEfRLa6ePYPsw6rje2wOEpi6htT.png',
                'tooltip' => 'Looking to go into a trades based business such as an electrician, plumber or builder - select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:30:50',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Professional Services',
                'icon' => '8xv1VnUyOJvaB2TwKzcMmqYaqTZ0bgFI.png',
                'hover_icon' => 'hZ5BjN5MhNwVWAtjyP8eOZdjR0sLLfVB.png',
                'tooltip' => 'This includes accounting, graphic design, marketing and more sit down based businesses.',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:31:07',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Online Shop / E-commerce',
                'icon' => '9C2ubbYRpyDdJ4MLO8MhUzV9RvhoblFz.png',
                'hover_icon' => '63gNDsJrWQwLGmuvcTzq0syGsGY2MsWf.png',
                'tooltip' => 'Looking at opening an online shopping based business.',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:31:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hospitality',
                'icon' => 'Th4l9caXkRaFnSc7zRaSnKa3LAvEi0Hn.png',
                'hover_icon' => 'kU34YVyvYkibtwY07Fz9AD1qatrPwmUS.png',
                'tooltip' => 'This is for cafe’s, restaurants and bars.  Serving food? Select this option',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:31:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Retail',
                'icon' => 'qWplT8oQwzmK02qfDSA34tZCxQNOCJBJ.png',
                'hover_icon' => 'ds1ndT5B9sVTahgaeiaLNV3hZ6ZwaPqB.png',
                'tooltip' => 'Looking at opening a physical shop and selling things, select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:32:13',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sole Trader',
                'icon' => 'nqyjTkzUW8sURLUQhMliy7EymBUihz6O.png',
                'hover_icon' => 'suX0qa7FbZQJxoO4mO9n8cIok7owoPK1.png',
                'tooltip' => 'Going it alone perhaps as a consultant, freelancer or personal trainer, select this option.',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 08:33:10',
            ),
        ));
        
        
    }
}