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

        \DB::table('user_profiles')->insert([
            0 =>
                [
                    'id'                   => 1,
                    'user_id'              => 4,
                    'company'              => 'Partner 1',
                    'affiliate_link_label' => 'Partner Link',
                    'affiliate_link'       => 'http://partner1.com/affiliate-link',
                    'billing_street1'      => null,
                    'billing_street2'      => null,
                    'billing_postcode'     => null,
                    'billing_state'        => null,
                    'billing_suburb'       => null,
                    'billing_country'      => null,
                    'residential_street1'  => null,
                    'residential_street2'  => null,
                    'residential_postcode' => null,
                    'residential_state'    => null,
                    'residential_suburb'   => null,
                    'residential_country'  => null,
                    'website'              => 'partner1.com',
                    'created_at'           => null,
                    'updated_at'           => null,
                ],
            1 =>
                [
                    'id'                   => 2,
                    'user_id'              => 5,
                    'company'              => 'Partner 2',
                    'affiliate_link_label' => 'Partner Link',
                    'affiliate_link'       => 'http://partner2.com/affiliate-link',
                    'billing_street1'      => null,
                    'billing_street2'      => null,
                    'billing_postcode'     => null,
                    'billing_state'        => null,
                    'billing_suburb'       => null,
                    'billing_country'      => null,
                    'residential_street1'  => null,
                    'residential_street2'  => null,
                    'residential_postcode' => null,
                    'residential_state'    => null,
                    'residential_suburb'   => null,
                    'residential_country'  => null,
                    'website'              => 'partner2.com',
                    'created_at'           => null,
                    'updated_at'           => null,
                ],
            2 =>
                [
                    'id'                   => 3,
                    'user_id'              => 9,
                    'company'              => 'Partner 3',
                    'affiliate_link_label' => 'Partner Link',
                    'affiliate_link'       => 'http://partner3.com/affiliate-link',
                    'billing_street1'      => null,
                    'billing_street2'      => null,
                    'billing_postcode'     => null,
                    'billing_state'        => null,
                    'billing_suburb'       => null,
                    'billing_country'      => null,
                    'residential_street1'  => null,
                    'residential_street2'  => null,
                    'residential_postcode' => null,
                    'residential_state'    => null,
                    'residential_suburb'   => null,
                    'residential_country'  => null,
                    'website'              => 'partner3.com',
                    'created_at'           => '2017-11-23 01:31:18',
                    'updated_at'           => '2017-11-23 01:31:18',
                ],
        ]);


    }
}