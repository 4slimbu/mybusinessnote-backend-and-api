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
            array (
                'user_id' => 4,
                'name' => 'domain',
                'description' => 'Register domain here',
                'link' => 'https://godaddy.com/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'user_id' => 4,
                'name' => 'hosting',
                'description' => 'Host your domain',
                'link' => 'https://godaddy.com/hosting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'user_id' => 5,
                'name' => 'logo',
                'description' => 'Create quick logo with us',
                'link' => 'https://logomaker.com/create/logo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'user_id' => 5,
                'name' => 'branding',
                'description' => 'Extensive branding with logo designing',
                'link' => 'https://logomaker.com/branding',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'user_id' => 9,
                'name' => 'business register',
                'description' => 'register your business with australian government',
                'link' => 'https://ausbusiness/register',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'user_id' => 4,
                'name' => 'email setup',
                'description' => 'email setup',
                'link' => 'https://setupemail.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}