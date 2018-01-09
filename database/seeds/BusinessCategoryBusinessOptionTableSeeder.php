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
            array (
                'business_category_id' => 1,
                'business_option_id' => 2,
            ),
            array (
                'business_category_id' => 2,
                'business_option_id' => 2,
            ),
            array (
                'business_category_id' => 3,
                'business_option_id' => 2,
            ),
            array (
                'business_category_id' => 5,
                'business_option_id' => 2,
            ),
            array (
                'business_category_id' => 6,
                'business_option_id' => 2,
            ),
            array (
                'business_category_id' => 7,
                'business_option_id' => 2,
            )
        ));
        
        
    }
}