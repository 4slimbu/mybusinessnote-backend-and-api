<?php

use Illuminate\Database\Seeder;

class AffiliateLinkBusinessOptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('affiliate_link_business_option')->delete();
        
        \DB::table('affiliate_link_business_option')->insert(array (
            0 => 
            array (
                'business_option_id' => 1,
                'affiliate_link_id' => 1,
            ),
            1 => 
            array (
                'business_option_id' => 2,
                'affiliate_link_id' => 2,
            ),
            2 => 
            array (
                'business_option_id' => 3,
                'affiliate_link_id' => 3,
            ),
            3 => 
            array (
                'business_option_id' => 4,
                'affiliate_link_id' => 1,
            ),
            4 => 
            array (
                'business_option_id' => 5,
                'affiliate_link_id' => 1,
            ),
        ));
        
        
    }
}