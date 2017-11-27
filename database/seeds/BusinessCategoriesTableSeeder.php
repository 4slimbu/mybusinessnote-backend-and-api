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
                'tooltip' => 'Normal category',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tradie',
                'tooltip' => 'Select this if you want to trade products',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Professional Services',
                'tooltip' => 'Select this if want to sell your services',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Online Shop / E-commerce',
                'tooltip' => 'Select this if you want to sell goods',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hospitality',
                'tooltip' => 'Select this if you want to sell hospitality services',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Retail',
                'tooltip' => 'Select this if you want to act as retailer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sole Trader',
                'tooltip' => 'Select this if you own a small trade',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}