<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(RoleSeeder::class);
        $this->call(BadgeSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(BusinessCategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(BusinessOptionSeeder::class);
        Model::reguard();
    }



}
