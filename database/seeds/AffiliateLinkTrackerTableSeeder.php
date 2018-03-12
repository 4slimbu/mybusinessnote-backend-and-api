<?php

use Illuminate\Database\Seeder;

class AffiliateLinkTrackerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('affiliate_link_tracker')->delete();

        \DB::table('affiliate_link_tracker')->insert([
            0 =>
                [
                    'id'                 => 1,
                    'affiliate_link_id'  => 3,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 5,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:27:14',
                    'updated_at'         => '2018-01-31 03:27:14',
                ],
            1 =>
                [
                    'id'                 => 2,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 6,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:27:24',
                    'updated_at'         => '2018-01-31 03:27:24',
                ],
            2 =>
                [
                    'id'                 => 3,
                    'affiliate_link_id'  => 1,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 10,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:28:05',
                    'updated_at'         => '2018-01-31 03:28:05',
                ],
            3 =>
                [
                    'id'                 => 4,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 11,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:28:14',
                    'updated_at'         => '2018-01-31 03:28:14',
                ],
            4 =>
                [
                    'id'                 => 5,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 12,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:28:24',
                    'updated_at'         => '2018-01-31 03:28:24',
                ],
            5 =>
                [
                    'id'                 => 6,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 12,
                    'business_id'        => 9,
                    'business_option_id' => 13,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:28:33',
                    'updated_at'         => '2018-01-31 03:28:33',
                ],
            6 =>
                [
                    'id'                 => 7,
                    'affiliate_link_id'  => 1,
                    'user_id'            => 18,
                    'business_id'        => 15,
                    'business_option_id' => 10,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:29:07',
                    'updated_at'         => '2018-01-31 03:29:07',
                ],
            7 =>
                [
                    'id'                 => 8,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 18,
                    'business_id'        => 15,
                    'business_option_id' => 19,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:29:15',
                    'updated_at'         => '2018-01-31 03:29:15',
                ],
            8 =>
                [
                    'id'                 => 9,
                    'affiliate_link_id'  => 2,
                    'user_id'            => 18,
                    'business_id'        => 15,
                    'business_option_id' => 24,
                    'browser'            => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                    'ip'                 => '127.0.0.1',
                    'created_at'         => '2018-01-31 03:29:29',
                    'updated_at'         => '2018-01-31 03:29:29',
                ],
        ]);


    }
}