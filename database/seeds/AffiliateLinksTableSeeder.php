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
                'name' => 'domain',
                'description' => 'Register domain here',
                'link' => 'https://godaddy.com/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'name' => 'hosting',
                'description' => 'Host your domain',
                'link' => 'https://godaddy.com/hosting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 5,
                'name' => 'logo',
                'description' => 'Create quick logo with us',
                'link' => 'https://logomaker.com/create/logo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 5,
                'name' => 'branding',
                'description' => 'Extensive branding with logo designing',
                'link' => 'https://logomaker.com/branding',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 9,
                'name' => 'business register',
                'description' => 'register your business with australian government',
                'link' => 'https://ausbusiness/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}