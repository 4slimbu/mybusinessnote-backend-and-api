<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->seedUserRoles();
        $this->seedDefaultUser();
        $this->seedBusinessCategory();
        $this->seedBusinessBadges();
    }


    /**
     * Seed user role data
     *
     * @return void
     */
    private function seedUserRoles(){

        $data = array(
            array('name'=>'administrator'),
            array('name'=>'customer'),
            array('name'=>'partner'),
        );


        DB::table('roles')->insert($data);

    }

    /**
     * Seed business category data
     *
     * @return void
     */
    private function seedBusinessCategory(){

        $data = array(
            array('title'=>'General'),
            array('title'=>'Tradie'),
            array('title'=>'Professional Services'),
            array('title'=>'Online Shop / E-commerce'),
            array('title'=>'Hospitality'),
            array('title'=>'Retail'),
            array('title'=>'Sole Trader')
        );


        DB::table('business_categories')->insert($data);

    }


    /**
     * Seed badges data
     *
     * @return void
     */
    private function seedBusinessBadges(){

        $data = array(
            array('name'=>'Getting down to Business',
                  'message'=>'Level 1 Complete, congratulations! [Badge Earned - “Getting down to business”]'
                ),
            array('name'=>'Setting the Foundations',
                  'message'=>'Level 2 Complete, congratulations! [Badge Earned - “Setting the Foundations”]'),

            array('name'=>'Building up a Business',
                'message'=>'Level 3 Complete, congratulations! [Badge Earned - “Building up a Business”]'),

        );


        DB::table('badges')->insert($data);

    }


    /**
     * Seed default user data
     *
     * @return void
     */
    private function seedDefaultUser(){

        $datas = array(
            array(
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
            ));


        DB::table('users')->insert($datas);

    }



}
