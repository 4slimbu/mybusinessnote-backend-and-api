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
                'slug' => 'getting-started',
                'parent_id' => null
            ],
            [
                'name' => 'Setting the Foundations',
                    'slug' => 'setting-the-foundations',
                'parent_id' => null
            ],
            [
                'name' => 'Building up a Business',
                'slug' => 'building-up-a-business',
                'parent_id' => null
            ],
            [
                'name' => 'Business Category',
                'slug' => 'business-category',
                'parent_id' => 1
            ],
            [
                'name' => 'About You',
                'slug' => 'about-you',
                'parent_id' => 1
            ],
            [
                'name' => 'Your Business Details',
                'slug' => 'your-business-details',
                'parent_id' => 1
            ],
            [
                'name' => 'Register Your Business',
                'slug' => 'register-your-business',
                'parent_id' => 1
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'parent_id' => 2
            ],
            [
                'name' => 'Operations',
                'slug' => 'operations',
                'parent_id' => 2
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'parent_id' => 2
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'parent_id' => 3
            ],
            [
                'name' => 'Legal',
                'slug' => 'legal',
                'parent_id' => 3
            ],
            [
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'parent_id' => 3
            ],
            [
                'name' => 'Operations',
                'slug' => 'operations',
                'parent_id' => 3
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'parent_id' => 3
            ],
        ];

        \DB::table('levels')->insert($data);
    }
}
