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
            array('name'=>'General', 'tooltip' => 'Normal category', 'icon' => 'general.png'),
            array('name'=>'Tradie', 'tooltip' => 'Select this if you want to trade products', 'icon' => 'tradie.png'),
            array('name'=>'Professional Services', 'tooltip' => 'Select this if want to sell your services', 'icon' => 'professional.png'),
            array('name'=>'Online Shop / E-commerce', 'tooltip' => 'Select this if you want to sell goods', 'icon' => 'ecommerce.png'),
            array('name'=>'Hospitality', 'tooltip' => 'Select this if you want to sell hospitality services', 'icon' => 'hospitality.png'),
            array('name'=>'Retail', 'tooltip' => 'Select this if you want to act as retailer', 'icon' => 'retail.png'),
            array('name'=>'Sole Trader', 'tooltip' => 'Select this if you own a small trade', 'icon' => 'sole.png')
        ));
        
        
    }
}