<?php

use Illuminate\Database\Seeder;

class BusinessLevelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('business_level')->delete();

        \DB::table('business_level')->insert([
            0  =>
                [
                    'business_id'       => 1,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            1  =>
                [
                    'business_id'       => 1,
                    'level_id'          => 2,
                    'completed_percent' => 50,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            2  =>
                [
                    'business_id'       => 7,
                    'level_id'          => 2,
                    'completed_percent' => 0,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            3  =>
                [
                    'business_id'       => 8,
                    'level_id'          => 1,
                    'completed_percent' => 50,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            4  =>
                [
                    'business_id'       => 9,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            5  =>
                [
                    'business_id'       => 10,
                    'level_id'          => 1,
                    'completed_percent' => 50,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            6  =>
                [
                    'business_id'       => 11,
                    'level_id'          => 1,
                    'completed_percent' => 75,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            7  =>
                [
                    'business_id'       => 12,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            8  =>
                [
                    'business_id'       => 12,
                    'level_id'          => 2,
                    'completed_percent' => 0,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            9  =>
                [
                    'business_id'       => 13,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            10 =>
                [
                    'business_id'       => 13,
                    'level_id'          => 2,
                    'completed_percent' => 67,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            11 =>
                [
                    'business_id'       => 14,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            12 =>
                [
                    'business_id'       => 14,
                    'level_id'          => 2,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            13 =>
                [
                    'business_id'       => 14,
                    'level_id'          => 3,
                    'completed_percent' => 0,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            14 =>
                [
                    'business_id'       => 15,
                    'level_id'          => 1,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            15 =>
                [
                    'business_id'       => 15,
                    'level_id'          => 2,
                    'completed_percent' => 100,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
            16 =>
                [
                    'business_id'       => 15,
                    'level_id'          => 3,
                    'completed_percent' => 80,
                    'created_at'        => null,
                    'updated_at'        => null,
                ],
        ]);


    }
}