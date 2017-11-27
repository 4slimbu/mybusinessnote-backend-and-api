<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'first_name' => 'Rameshwor',
                'last_name' => 'Maharjan',
                'phone_number' => NULL,
                'email' => 'ramesh@octomedia.com.au',
                'password' => '$2y$10$T20b4Jjf0JnlgUuJqUwhNOeXTGLxUWzyL9isW0C3Eo60nqSnIgPMi',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'first_name' => 'Sudip',
                'last_name' => 'Limbu',
                'phone_number' => NULL,
                'email' => 'sudip@gmail.com',
                'password' => '$2y$10$NQ3DH1z/KpaNPHadhk.t/ei/lP.NgGu2n5HSz2jwfIh3WO/gZZcWK',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'first_name' => 'Ram',
                'last_name' => 'Karki',
                'phone_number' => '9828388383',
                'email' => 'ram@gmail.com',
                'password' => '$2y$10$931fqK.2Eye5rdACFvrIX.RyFtV96f8QUdIKk12y/yBAZAABKTOJq',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2017-11-23 01:10:16',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'first_name' => 'Go',
                'last_name' => 'Daddy',
                'phone_number' => NULL,
                'email' => 'godaddy@gmail.com',
                'password' => '$2y$10$kAgNFoo50s9wMXvambeRVOj9mbjMOKRUTUXqJUaWEQ1QQrn3SAd3y',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 3,
                'first_name' => 'Logo',
                'last_name' => 'Maker',
                'phone_number' => NULL,
                'email' => 'logomaker@gmail.com',
                'password' => '$2y$10$u0iz1Q7TZc4/wtzB8jLwvO8ugo6etlGs4N0SjW3Ef2uKr1uRsz5.6',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'first_name' => 'Unverified',
                'last_name' => 'Customer',
                'phone_number' => '99288383833',
                'email' => 'unverifiedcustomer@gmail.com',
                'password' => '$2y$10$rbJphYsVe5XQP6cpq/hGK.mvUusLMCYpCxtaCLYg3T/ugXKyIpdMq',
                'verified' => 0,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-11-23 01:10:56',
                'updated_at' => '2017-11-23 01:10:56',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 2,
                'first_name' => 'Sita',
                'last_name' => 'Kharel',
                'phone_number' => '992838883',
                'email' => 'sitakharel@gmail.com',
                'password' => '$2y$10$h6T4CLjG7aT9hLuta1C19.wqnu9GH1BeqZ7WMvZsg0ekWKcyQQ.l6',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-11-23 01:11:35',
                'updated_at' => '2017-11-23 01:11:35',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'first_name' => 'Sanup',
                'last_name' => 'Poudel',
                'phone_number' => '992883838',
                'email' => 'sanuppoudel@gmail.com',
                'password' => '$2y$10$oGlJk7scqx6yyrIiU5iW5OOEaR513GdOd3RnL75RN90reyVKlAm9W',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-11-23 01:12:04',
                'updated_at' => '2017-11-23 01:12:04',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 3,
                'first_name' => 'Australian Government',
                'last_name' => 'ABN',
                'phone_number' => '998823838',
                'email' => 'ausg@gmail.com',
                'password' => '$2y$10$029FQ2oCZKANqXrIqdFTMOM0qT7yOaa5Fys/Vr/dvpPbTEmQjsdY2',
                'verified' => 1,
                'token' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-11-23 01:31:18',
                'updated_at' => '2017-11-23 01:31:18',
            ),
        ));
        
        
    }
}