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
                'name' => 'Getting Started',
                'parent_id' => null
            ],
            [
                'name' => 'Setting the Foundations',
                'parent_id' => null
            ],
            [
                'name' => 'Building up a Business',
                'parent_id' => null
            ],
            [
                'name' => 'Business Category',
                'parent_id' => 1
            ],
            [
                'name' => 'About You',
                'parent_id' => 1
            ],
            [
                'name' => 'Your Business Details',
                'parent_id' => 1
            ],
            [
                'name' => 'Register Your Business',
                'parent_id' => 1
            ],
            [
                'name' => 'Marketing',
                'parent_id' => 2
            ],
            [
                'name' => 'Operations',
                'parent_id' => 2
            ],
            [
                'name' => 'Finance',
                'parent_id' => 2
            ],
            [
                'name' => 'Marketing',
                'parent_id' => 3
            ],
            [
                'name' => 'Legal',
                'parent_id' => 3
            ],
            [
                'name' => 'Human Resources',
                'parent_id' => 3
            ],
            [
                'name' => 'Operations',
                'parent_id' => 3
            ],
            [
                'name' => 'Finance',
                'parent_id' => 3
            ],
        ];

        \DB::table('levels')->insert($data);
    }
}
