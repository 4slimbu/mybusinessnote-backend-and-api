<?php

use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('businesses')->delete();
        \DB::table('businesses')->insert([
            [
                'id'                   => 1,
                'user_id'              => 2,
                'business_category_id' => 7,
                'business_name'        => 'Sporer, Sauer and Pfeffer',
                'website'              => 'http://website.com',
                'abn'                  => '8039398689919',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:14:43',
            ],
            [
                'id'                   => 2,
                'user_id'              => 3,
                'business_category_id' => 3,
                'business_name'        => 'Zemlak and Sons',
                'website'              => 'http://website.com',
                'abn'                  => '1395043490659',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:14:24',
            ],
            [
                'id'                   => 3,
                'user_id'              => 6,
                'business_category_id' => 7,
                'business_name'        => 'Conn, Gottlieb and Armstrong',
                'website'              => 'http://website.com',
                'abn'                  => '0130410251546',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:14:12',
            ],
            [
                'id'                   => 4,
                'user_id'              => 8,
                'business_category_id' => 1,
                'business_name'        => 'Ratke-Raynor',
                'website'              => 'http://website.com',
                'abn'                  => '9832664714464',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:13:47',
            ],
            [
                'id'                   => 5,
                'user_id'              => 7,
                'business_category_id' => 1,
                'business_name'        => 'Kuhic and Sons',
                'website'              => 'http://website.com',
                'abn'                  => '7628000398892',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:13:34',
            ],
            [
                'id'                   => 7,
                'user_id'              => 10,
                'business_category_id' => 7,
                'business_name'        => '',
                'website'              => '',
                'abn'                  => '',
                'sell_goods'           => null,
                'created_at'           => '2017-11-22 09:33:17',
                'updated_at'           => '2017-11-23 01:13:22',
            ],
            [
                'id'                   => 8,
                'user_id'              => 11,
                'business_category_id' => 1,
                'business_name'        => null,
                'website'              => null,
                'abn'                  => null,
                'sell_goods'           => 1,
                'created_at'           => '2018-01-25 05:07:19',
                'updated_at'           => '2018-01-25 05:07:19',
            ],
            [
                'id'                   => 9,
                'user_id'              => 12,
                'business_category_id' => 3,
                'business_name'        => 'mybusiness',
                'website'              => 'http://mybusiness.com',
                'abn'                  => '8888 8888 8888',
                'sell_goods'           => 1,
                'created_at'           => '2018-01-25 05:08:12',
                'updated_at'           => '2018-01-25 05:09:11',
            ],
            [
                'id'                   => 10,
                'user_id'              => 13,
                'business_category_id' => 4,
                'business_name'        => null,
                'website'              => null,
                'abn'                  => null,
                'sell_goods'           => 1,
                'created_at'           => '2018-01-25 05:10:28',
                'updated_at'           => '2018-01-25 05:10:28',
            ],
            [
                'id'                   => 11,
                'user_id'              => 14,
                'business_category_id' => 1,
                'business_name'        => 'mybusinessname',
                'website'              => 'http://lksdfjsld.com',
                'abn'                  => null,
                'sell_goods'           => 0,
                'created_at'           => '2018-01-25 05:11:09',
                'updated_at'           => '2018-01-25 05:11:22',
            ],
            [
                'id'                   => 12,
                'user_id'              => 15,
                'business_category_id' => 7,
                'business_name'        => 'mubusiness',
                'website'              => 'http://mubys.com',
                'abn'                  => '8888 8888 8888',
                'sell_goods'           => 1,
                'created_at'           => '2018-01-25 05:12:15',
                'updated_at'           => '2018-01-25 05:12:42',
            ],
            [
                'id'                   => 13,
                'user_id'              => 16,
                'business_category_id' => 1,
                'business_name'        => 'lvel',
                'website'              => 'http://lll.com',
                'abn'                  => '8888 8888 8888',
                'sell_goods'           => 1,
                'created_at'           => '2018-01-25 05:14:42',
                'updated_at'           => '2018-01-25 05:15:01',
            ],
            [
                'id'                   => 14,
                'user_id'              => 17,
                'business_category_id' => 5,
                'business_name'        => 'mybusiness',
                'website'              => 'http://muyb.com',
                'abn'                  => '8888 8888 8888',
                'sell_goods'           => 0,
                'created_at'           => '2018-01-25 05:17:47',
                'updated_at'           => '2018-01-25 05:18:11',
            ],
            [
                'id'                   => 15,
                'user_id'              => 18,
                'business_category_id' => 1,
                'business_name'        => 'aslkfd',
                'website'              => 'http://lskdjfsdl.com',
                'abn'                  => '9999 9999 9999',
                'sell_goods'           => 0,
                'created_at'           => '2018-01-25 05:21:00',
                'updated_at'           => '2018-01-25 05:21:20',
            ],
        ]);


    }
}