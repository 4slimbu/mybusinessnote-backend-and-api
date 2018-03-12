<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sections')->delete();

        \DB::table('sections')->insert([
            0  =>
                [
                    'id'         => 1,
                    'level_id'   => 1,
                    'name'       => 'Business Category',
                    'slug'       => 'business-category',
                    'icon'       => 'business-category.png',
                    'tooltip'    => '<p>Business Category tool tip</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:58:21',
                ],
            1  =>
                [
                    'id'         => 2,
                    'level_id'   => 1,
                    'name'       => 'About You',
                    'slug'       => 'about-you',
                    'icon'       => 'about-you.png',
                    'tooltip'    => '<p>About You</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:58:30',
                ],
            2  =>
                [
                    'id'         => 3,
                    'level_id'   => 1,
                    'name'       => 'Your Business Details',
                    'slug'       => 'your-business-details',
                    'icon'       => 'your-business-details.png',
                    'tooltip'    => 'Your Business Details',
                    'created_at' => null,
                    'updated_at' => null,
                ],
            3  =>
                [
                    'id'         => 4,
                    'level_id'   => 1,
                    'name'       => 'Register Your Business',
                    'slug'       => 'register-your-business',
                    'icon'       => 'register-your-business.png',
                    'tooltip'    => 'Register Your Business',
                    'created_at' => null,
                    'updated_at' => null,
                ],
            4  =>
                [
                    'id'         => 5,
                    'level_id'   => 2,
                    'name'       => 'Marketing',
                    'slug'       => 'marketing',
                    'icon'       => 'T32YluDbcTeIZBSZhpvSBbQrRUYt5R9u.png',
                    'tooltip'    => '<p>Marketing</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:58:56',
                ],
            5  =>
                [
                    'id'         => 6,
                    'level_id'   => 2,
                    'name'       => 'Finance',
                    'slug'       => 'finance',
                    'icon'       => 'XzydnwOa7Bujxgs159EQzWH7BFTwIKel.png',
                    'tooltip'    => '<p>Finance</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:59:12',
                ],
            6  =>
                [
                    'id'         => 7,
                    'level_id'   => 2,
                    'name'       => 'Operations',
                    'slug'       => 'operations',
                    'icon'       => 'ZPvUD0ckzhSEl6UzX3mwFzvEiaWxG184.png',
                    'tooltip'    => '<p>Operations</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:59:22',
                ],
            7  =>
                [
                    'id'         => 8,
                    'level_id'   => 3,
                    'name'       => 'Marketing',
                    'slug'       => 'marketing',
                    'icon'       => 'lldM7uK2NpqmgkueEDc7qdXz8rxJOPl3.png',
                    'tooltip'    => '<p>Marketing</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:59:33',
                ],
            8  =>
                [
                    'id'         => 9,
                    'level_id'   => 3,
                    'name'       => 'Legal',
                    'slug'       => 'legal',
                    'icon'       => 'mfQcol29DuQqEsbTeQNz5QfQb6Cla2Ln.png',
                    'tooltip'    => '<p>Legal</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:59:43',
                ],
            9  =>
                [
                    'id'         => 10,
                    'level_id'   => 3,
                    'name'       => 'Human Resources',
                    'slug'       => 'human-resources',
                    'icon'       => '0EZ6iuduiQjQag0mKeEzM9pAVfTXirUJ.png',
                    'tooltip'    => '<p>Human Resources</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 08:59:53',
                ],
            10 =>
                [
                    'id'         => 11,
                    'level_id'   => 3,
                    'name'       => 'Finance',
                    'slug'       => 'finance',
                    'icon'       => 'KNnol52Txhd1GRPprQ7vvFZ7VWRL3fJM.png',
                    'tooltip'    => '<p>Finance</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 09:00:03',
                ],
            11 =>
                [
                    'id'         => 12,
                    'level_id'   => 3,
                    'name'       => 'Operations',
                    'slug'       => 'operations',
                    'icon'       => 'dSPU484XjIJm1GTrvSJFmLNOt0oat5oH.png',
                    'tooltip'    => '<p>Operations</p>',
                    'created_at' => null,
                    'updated_at' => '2018-01-24 09:00:13',
                ],
        ]);


    }
}