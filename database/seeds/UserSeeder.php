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
                'phone_number'=>'0449006591',
                'company'=>'0',
                'billing_street1'=>'0',
                'billing_street2'=>'0',
                'billing_postcode'=>'0',
                'billing_state'=>'0',
                'billing_suburb'=>'0',
                'billing_country'=>'0',
                'residential_street1'=>'0',
                'residential_street2'=>'0',
                'residential_postcode'=>'0',
                'residential_state'=>'0',
                'residential_suburb'=>'0',
                'residential_country'=>'0',
                'role_id'=>'1',
                'email'=>'ramesh@octomedia.com.au',
                'password'=>bcrypt('newmoon123'),
                'verified'=>1
            ],
            [
                'first_name'=>'Sudip',
                'last_name'=>'Limbu',
                'phone_number'=>'0449006591',
                'company'=>'0',
                'billing_street1'=>'0',
                'billing_street2'=>'0',
                'billing_postcode'=>'0',
                'billing_state'=>'0',
                'billing_suburb'=>'0',
                'billing_country'=>'0',
                'residential_street1'=>'0',
                'residential_street2'=>'0',
                'residential_postcode'=>'0',
                'residential_state'=>'0',
                'residential_suburb'=>'0',
                'residential_country'=>'0',
                'role_id'=>'1',
                'email'=>'sudip@gmail.com',
                'password'=>bcrypt('password'),
                'verified'=>1
            ]
        ];

        \DB::table('users')->insert($data);

    }
}
