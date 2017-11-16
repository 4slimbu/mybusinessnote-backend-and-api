<?php

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
            array('title'=>'General'),
            array('title'=>'Tradie'),
            array('title'=>'Professional Services'),
            array('title'=>'Online Shop / E-commerce'),
            array('title'=>'Hospitality'),
            array('title'=>'Retail'),
            array('title'=>'Sole Trader')
        );


        \DB::table('business_categories')->insert($data);
    }
}
