<?php

use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_profiles')->delete();
        
        \DB::table('user_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'company' => 'Godaddy',
                'billing_street1' => NULL,
                'billing_street2' => NULL,
                'billing_postcode' => NULL,
                'billing_state' => NULL,
                'billing_suburb' => NULL,
                'billing_country' => NULL,
                'residential_street1' => NULL,
                'residential_street2' => NULL,
                'residential_postcode' => NULL,
                'residential_state' => NULL,
                'residential_suburb' => NULL,
                'residential_country' => NULL,
                'website' => 'godaddy.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 5,
                'company' => 'Logo Maker',
                'billing_street1' => NULL,
                'billing_street2' => NULL,
                'billing_postcode' => NULL,
                'billing_state' => NULL,
                'billing_suburb' => NULL,
                'billing_country' => NULL,
                'residential_street1' => NULL,
                'residential_street2' => NULL,
                'residential_postcode' => NULL,
                'residential_state' => NULL,
                'residential_suburb' => NULL,
                'residential_country' => NULL,
                'website' => 'logomaker.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 9,
                'company' => 'Australian Government',
                'billing_street1' => NULL,
                'billing_street2' => NULL,
                'billing_postcode' => NULL,
                'billing_state' => NULL,
                'billing_suburb' => NULL,
                'billing_country' => NULL,
                'residential_street1' => NULL,
                'residential_street2' => NULL,
                'residential_postcode' => NULL,
                'residential_state' => NULL,
                'residential_suburb' => NULL,
                'residential_country' => NULL,
                'website' => 'australiangov.com',
                'created_at' => '2017-11-23 01:31:18',
                'updated_at' => '2017-11-23 01:31:18',
            ),
        ));
        
        
    }
}