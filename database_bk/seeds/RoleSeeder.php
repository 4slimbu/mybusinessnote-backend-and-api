<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'administrator'),
            array('name'=>'customer'),
            array('name'=>'partner'),
        );


        \DB::table('roles')->insert($data);
    }
}
