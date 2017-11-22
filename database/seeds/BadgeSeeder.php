<?php

use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
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
                'icon'=>'badge_placeholder.jpg',
                'message'=>'Start creating your awesome business, congratulations! [Badge Earned - "Getting Started"]'
            ],
            [
                'name'=>'Getting down to Business',
                'icon'=>'badge_placeholder.jpg',
                'message'=>'Level 1 Complete, congratulations! [Badge Earned - "Getting down to business"]'
            ],
            [
                'name'=>'Setting the Foundations',
                'icon'=>'badge_placeholder.jpg',
                'message'=>'Level 2 Complete, congratulations! [Badge Earned - "Setting the Foundations"]'
            ],
            [
                'name'=>'Building up a Business',
                'icon'=>'badge_placeholder.jpg',
                'message'=>'Level 3 Complete, congratulations! [Badge Earned - "Building up a Business"]'
            ],
            [
                'name'=>'Running the Business',
                'icon'=>'badge_placeholder.jpg',
                'message'=>'Level 4 Complete, congratulations! [Badge Earned - "Running the Business"]'
            ]
        ];

        \DB::table('badges')->insert($data);
    }
}
