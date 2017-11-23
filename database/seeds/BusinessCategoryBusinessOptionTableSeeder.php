<?php

use Illuminate\Database\Seeder;

class BusinessCategoryBusinessOptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_category_business_option')->delete();
        
        \DB::table('business_category_business_option')->insert(array (
            0 => 
            array (
                'business_category_id' => 4,
                'business_option_id' => 18,
            ),
        ));
        
        
    }
}