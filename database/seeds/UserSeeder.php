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
        $data = [
            [
                'first_name'=>'Rameshwor',
                'last_name'=>'Maharjan',
                'role_id'=>'1',
                'email'=>'ramesh@octomedia.com.au',
                'password'=>bcrypt('newmoon123'),
                'verified'=>1
            ],
            [
                'first_name'=>'Sudip',
                'last_name'=>'Limbu',
                'role_id'=>'1',
                'email'=>'sudip@gmail.com',
                'password'=>bcrypt('password'),
                'verified'=>1
            ]
        ];

        \DB::table('users')->insert($data);

    }
}
