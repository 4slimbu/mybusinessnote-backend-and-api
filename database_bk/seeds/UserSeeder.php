<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Create all types of users
         */
        $users = [
            [
                'first_name' => 'Rameshwor',
                'last_name' => 'Maharjan',
                'role_id' => '1',
                'email' => 'ramesh@octomedia.com.au',
                'password' => bcrypt('newmoon123'),
                'verified' => 1
            ],
            [
                'first_name' => 'Sudip',
                'last_name' => 'Limbu',
                'role_id' => '1',
                'email' => 'sudip@gmail.com',
                'password' => bcrypt('password'),
                'verified' => 1
            ],
            [
                'first_name' => 'Customer',
                'last_name' => 'last',
                'role_id' => '2',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('password'),
                'verified' => 1
            ],
            [
                'first_name' => 'Go',
                'last_name' => 'Daddy',
                'role_id' => '3',
                'email' => 'godaddy@gmail.com',
                'password' => bcrypt('password'),
                'verified' => 1
            ],
            [
                'first_name' => 'Logo',
                'last_name' => 'Maker',
                'role_id' => '3',
                'email' => 'logomaker@gmail.com',
                'password' => bcrypt('password'),
                'verified' => 1
            ],
        ];

        \DB::table('users')->insert($users);

        /**
         * Create Partner Profile
         */

        $userProfiles = [
            [
                'user_id' => 4, //id of user with role 3
                'company' => 'Godaddy',
                'website' => 'godaddy.com'
            ],
            [
                'user_id' => 5,
                'company' => 'Logo Maker',
                'website' => 'logomaker.com'
            ]
        ];

        \DB::table('user_profiles')->insert($userProfiles);

        /**
         * Create Partner Affiliate Links
         */

        $affiliateLinks = [
            [
                'user_id' => 4, //id of user with role 3
                'name' => 'domain',
                'description' => 'Register domain here',
                'link' => 'https://godaddy.com/register'
            ],
            [
                'user_id' => 4, //id of user with role 3
                'name' => 'hosting',
                'description' => 'Host your domain',
                'link' => 'https://godaddy.com/hosting'
            ],
            [
                'user_id' => 5, //id of user with role 3
                'name' => 'logo',
                'description' => 'Create quick logo with us',
                'link' => 'https://logomaker.com/create/logo'
            ],
            [
                'user_id' => 5, //id of user with role 3
                'name' => 'branding',
                'description' => 'Extensive branding with logo designing',
                'link' => 'https://logomaker.com/branding'
            ],
        ];

        \DB::table('affiliate_links')->insert($affiliateLinks);

    }
}
