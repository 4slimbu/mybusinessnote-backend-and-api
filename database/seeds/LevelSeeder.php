<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
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
                'name'=>'Getting Started',
            ],
            [
                'name'=>'Setting the Foundations',
            ],
            [
                'name'=>'Building up a Business',
            ]
        ];

        \DB::table('levels')->insert($data);
    }
}
