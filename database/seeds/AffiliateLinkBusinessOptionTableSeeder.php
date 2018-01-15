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
                'business_option_id' => 4,
                'affiliate_link_id' => 1,
            ),
            1 => 
            array (
                'business_option_id' => 5,
                'affiliate_link_id' => 5,
            ),
            2 => 
            array (
                'business_option_id' => 6,
                'affiliate_link_id' => 3,
            ),
            3 => 
            array (
                'business_option_id' => 11,
                'affiliate_link_id' => 3,
            ),
            4 => 
            array (
                'business_option_id' => 13,
                'affiliate_link_id' => 4,
            ),
        ));
        
        
    }
}