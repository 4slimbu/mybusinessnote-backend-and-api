<?php

use Illuminate\Database\Seeder;

class AffiliateLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('affiliate_links')->delete();
        
        \DB::table('affiliate_links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'name' => 'Partner Link',
                'description' => 'Register domain here',
                'link' => 'http://partner1.com/affiliate-link',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:19:31',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 5,
                'name' => 'Partner Link',
                'description' => 'Create quick logo with us',
                'link' => 'http://partner2.com/affiliate-link',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:19:18',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 9,
                'name' => 'Partner Link',
                'description' => 'register your business with australian government',
                'link' => 'http://partner3.com/affiliate-link',
                'created_at' => NULL,
                'updated_at' => '2018-01-24 09:19:07',
            ),
        ));
        
        
    }
}