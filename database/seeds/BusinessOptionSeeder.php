<?php

use Illuminate\Database\Seeder;

class BusinessOptionSeeder extends Seeder
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
                'level_id' => 4,
                'parent_id' => null,
                'name'=>'Getting Started',
                'content' => 'beginning',
                'weight' => null,
                'show_everywhere' => 1
            ],
            [
                'level_id' => 4,
                'parent_id' => null,
                'name'=>'What industry is your business idea in',
                'content'=>'shortcode for business category list',
                'weight' => 1,
                'show_everywhere' => 1
            ]
        ];

        \DB::table('business_options')->insert($data);
    }
}
