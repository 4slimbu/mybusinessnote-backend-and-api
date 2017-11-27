<?php

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'General', 'tooltip' => 'Normal category'),
            array('name'=>'Tradie', 'tooltip' => 'Select this if you want to trade products'),
            array('name'=>'Professional Services', 'tooltip' => 'Select this if want to sell your services'),
            array('name'=>'Online Shop / E-commerce', 'tooltip' => 'Select this if you want to sell goods'),
            array('name'=>'Hospitality', 'tooltip' => 'Select this if you want to sell hospitality services'),
            array('name'=>'Retail', 'tooltip' => 'Select this if you want to act as retailer'),
            array('name'=>'Sole Trader', 'tooltip' => 'Select this if you own a small trade')
        );


        \DB::table('business_categories')->insert($data);
    }
}
