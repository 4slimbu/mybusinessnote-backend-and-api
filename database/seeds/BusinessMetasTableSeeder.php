<?php

use Illuminate\Database\Seeder;

class BusinessMetasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_metas')->delete();
        
        \DB::table('business_metas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'business_id' => 7,
                'business_option_id' => 10,
                'key' => 'financing_option',
                'value' => 'option 1',
                'created_at' => '2018-01-12 05:42:00',
                'updated_at' => '2018-01-12 05:42:00',
            ),
            1 => 
            array (
                'id' => 2,
                'business_id' => 12,
                'business_option_id' => 6,
                'key' => 'logo',
                'value' => 'logo_12_5a69675c08919.jpg',
                'created_at' => '2018-01-25 05:13:00',
                'updated_at' => '2018-01-25 05:13:00',
            ),
            2 => 
            array (
                'id' => 3,
                'business_id' => 12,
                'business_option_id' => 7,
                'key' => 'tagline',
                'value' => 'tagline',
                'created_at' => '2018-01-25 05:13:08',
                'updated_at' => '2018-01-25 05:13:08',
            ),
            3 => 
            array (
                'id' => 4,
                'business_id' => 12,
                'business_option_id' => 8,
                'key' => 'brand_color',
                'value' => '#72a951',
                'created_at' => '2018-01-25 05:13:14',
                'updated_at' => '2018-01-25 05:13:14',
            ),
            4 => 
            array (
                'id' => 5,
                'business_id' => 13,
                'business_option_id' => 6,
                'key' => 'logo',
                'value' => 'logo_13_5a6967e223d86.jpg',
                'created_at' => '2018-01-25 05:15:14',
                'updated_at' => '2018-01-25 05:15:14',
            ),
            5 => 
            array (
                'id' => 6,
                'business_id' => 13,
                'business_option_id' => 7,
                'key' => 'tagline',
                'value' => 'tagline',
                'created_at' => '2018-01-25 05:15:21',
                'updated_at' => '2018-01-25 05:15:21',
            ),
            6 => 
            array (
                'id' => 7,
                'business_id' => 13,
                'business_option_id' => 8,
                'key' => 'brand_color',
                'value' => '#f7e461',
                'created_at' => '2018-01-25 05:15:28',
                'updated_at' => '2018-01-25 05:15:28',
            ),
            7 => 
            array (
                'id' => 8,
                'business_id' => 13,
                'business_option_id' => 9,
                'key' => 'twitter',
                'value' => 'facebook.com',
                'created_at' => '2018-01-25 05:15:40',
                'updated_at' => '2018-01-25 05:15:40',
            ),
            8 => 
            array (
                'id' => 9,
                'business_id' => 13,
                'business_option_id' => 10,
                'key' => 'financing_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:15:48',
                'updated_at' => '2018-01-25 05:15:48',
            ),
            9 => 
            array (
                'id' => 10,
                'business_id' => 13,
                'business_option_id' => 11,
                'key' => 'initial_accounting_software',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:15:54',
                'updated_at' => '2018-01-25 05:15:54',
            ),
            10 => 
            array (
                'id' => 11,
                'business_id' => 13,
                'business_option_id' => 12,
                'key' => 'business_banking',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:16:00',
                'updated_at' => '2018-01-25 05:16:00',
            ),
            11 => 
            array (
                'id' => 12,
                'business_id' => 13,
                'business_option_id' => 13,
                'key' => 'merchant_facilities',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:16:06',
                'updated_at' => '2018-01-25 05:16:06',
            ),
            12 => 
            array (
                'id' => 13,
                'business_id' => 13,
                'business_option_id' => 14,
                'key' => 'business_email_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:16:13',
                'updated_at' => '2018-01-25 05:16:13',
            ),
            13 => 
            array (
                'id' => 14,
                'business_id' => 13,
                'business_option_id' => 15,
                'key' => 'phone_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:16:18',
                'updated_at' => '2018-01-25 05:16:18',
            ),
            14 => 
            array (
                'id' => 15,
                'business_id' => 13,
                'business_option_id' => 16,
                'key' => 'quick_office_setup',
                'value' => 'already_have',
                'created_at' => '2018-01-25 05:16:23',
                'updated_at' => '2018-01-25 05:16:23',
            ),
            15 => 
            array (
                'id' => 16,
                'business_id' => 13,
                'business_option_id' => 17,
                'key' => 'setup_internet',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:16:53',
                'updated_at' => '2018-01-25 05:16:53',
            ),
            16 => 
            array (
                'id' => 17,
                'business_id' => 14,
                'business_option_id' => 6,
                'key' => 'logo',
                'value' => 'logo_14_5a69689ea6be8.jpg',
                'created_at' => '2018-01-25 05:18:22',
                'updated_at' => '2018-01-25 05:18:22',
            ),
            17 => 
            array (
                'id' => 18,
                'business_id' => 14,
                'business_option_id' => 7,
                'key' => 'tagline',
                'value' => 'tagline',
                'created_at' => '2018-01-25 05:18:29',
                'updated_at' => '2018-01-25 05:18:29',
            ),
            18 => 
            array (
                'id' => 19,
                'business_id' => 14,
                'business_option_id' => 8,
                'key' => 'brand_color',
                'value' => '#72a951',
                'created_at' => '2018-01-25 05:18:35',
                'updated_at' => '2018-01-25 05:18:35',
            ),
            19 => 
            array (
                'id' => 20,
                'business_id' => 14,
                'business_option_id' => 9,
                'key' => 'twitter',
                'value' => 'facebook.com',
                'created_at' => '2018-01-25 05:18:44',
                'updated_at' => '2018-01-25 05:18:44',
            ),
            20 => 
            array (
                'id' => 21,
                'business_id' => 14,
                'business_option_id' => 10,
                'key' => 'financing_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:18:52',
                'updated_at' => '2018-01-25 05:18:52',
            ),
            21 => 
            array (
                'id' => 22,
                'business_id' => 14,
                'business_option_id' => 11,
                'key' => 'initial_accounting_software',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:18:57',
                'updated_at' => '2018-01-25 05:18:57',
            ),
            22 => 
            array (
                'id' => 23,
                'business_id' => 14,
                'business_option_id' => 12,
                'key' => 'business_banking',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:02',
                'updated_at' => '2018-01-25 05:19:02',
            ),
            23 => 
            array (
                'id' => 24,
                'business_id' => 14,
                'business_option_id' => 13,
                'key' => 'merchant_facilities',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:08',
                'updated_at' => '2018-01-25 05:19:08',
            ),
            24 => 
            array (
                'id' => 25,
                'business_id' => 14,
                'business_option_id' => 14,
                'key' => 'business_email_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:17',
                'updated_at' => '2018-01-25 05:19:17',
            ),
            25 => 
            array (
                'id' => 26,
                'business_id' => 14,
                'business_option_id' => 15,
                'key' => 'phone_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:22',
                'updated_at' => '2018-01-25 05:19:22',
            ),
            26 => 
            array (
                'id' => 27,
                'business_id' => 14,
                'business_option_id' => 16,
                'key' => 'quick_office_setup',
                'value' => 'already_have',
                'created_at' => '2018-01-25 05:19:26',
                'updated_at' => '2018-01-25 05:19:26',
            ),
            27 => 
            array (
                'id' => 28,
                'business_id' => 14,
                'business_option_id' => 17,
                'key' => 'setup_internet',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:31',
                'updated_at' => '2018-01-25 05:19:31',
            ),
            28 => 
            array (
                'id' => 29,
                'business_id' => 14,
                'business_option_id' => 18,
                'key' => 'office_accessories',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:37',
                'updated_at' => '2018-01-25 05:19:37',
            ),
            29 => 
            array (
                'id' => 30,
                'business_id' => 14,
                'business_option_id' => 19,
                'key' => 'swot',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:52',
                'updated_at' => '2018-01-25 05:19:52',
            ),
            30 => 
            array (
                'id' => 31,
                'business_id' => 14,
                'business_option_id' => 20,
                'key' => 'customer_analysis',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:19:57',
                'updated_at' => '2018-01-25 05:19:57',
            ),
            31 => 
            array (
                'id' => 32,
                'business_id' => 14,
                'business_option_id' => 21,
                'key' => 'demographic_events',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:20:03',
                'updated_at' => '2018-01-25 05:20:03',
            ),
            32 => 
            array (
                'id' => 33,
                'business_id' => 14,
                'business_option_id' => 22,
                'key' => 'social_media_execution',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:20:10',
                'updated_at' => '2018-01-25 05:20:10',
            ),
            33 => 
            array (
                'id' => 34,
                'business_id' => 15,
                'business_option_id' => 6,
                'key' => 'logo',
                'value' => 'logo_15_5a69696364146.jpg',
                'created_at' => '2018-01-25 05:21:39',
                'updated_at' => '2018-01-25 05:21:39',
            ),
            34 => 
            array (
                'id' => 35,
                'business_id' => 15,
                'business_option_id' => 7,
                'key' => 'tagline',
                'value' => 'tagline',
                'created_at' => '2018-01-25 05:21:46',
                'updated_at' => '2018-01-25 05:21:46',
            ),
            35 => 
            array (
                'id' => 36,
                'business_id' => 15,
                'business_option_id' => 8,
                'key' => 'brand_color',
                'value' => '#cde1e0',
                'created_at' => '2018-01-25 05:21:52',
                'updated_at' => '2018-01-25 05:21:52',
            ),
            36 => 
            array (
                'id' => 37,
                'business_id' => 15,
                'business_option_id' => 9,
                'key' => 'twitter',
                'value' => 'twitter.com',
                'created_at' => '2018-01-25 05:22:01',
                'updated_at' => '2018-01-25 05:22:01',
            ),
            37 => 
            array (
                'id' => 38,
                'business_id' => 15,
                'business_option_id' => 10,
                'key' => 'financing_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:07',
                'updated_at' => '2018-01-25 05:22:07',
            ),
            38 => 
            array (
                'id' => 39,
                'business_id' => 15,
                'business_option_id' => 11,
                'key' => 'initial_accounting_software',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:13',
                'updated_at' => '2018-01-25 05:22:13',
            ),
            39 => 
            array (
                'id' => 40,
                'business_id' => 15,
                'business_option_id' => 12,
                'key' => 'business_banking',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:19',
                'updated_at' => '2018-01-25 05:22:19',
            ),
            40 => 
            array (
                'id' => 41,
                'business_id' => 15,
                'business_option_id' => 13,
                'key' => 'merchant_facilities',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:25',
                'updated_at' => '2018-01-25 05:22:25',
            ),
            41 => 
            array (
                'id' => 42,
                'business_id' => 15,
                'business_option_id' => 14,
                'key' => 'business_email_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:33',
                'updated_at' => '2018-01-25 05:22:33',
            ),
            42 => 
            array (
                'id' => 43,
                'business_id' => 15,
                'business_option_id' => 15,
                'key' => 'phone_setup',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:38',
                'updated_at' => '2018-01-25 05:22:38',
            ),
            43 => 
            array (
                'id' => 44,
                'business_id' => 15,
                'business_option_id' => 16,
                'key' => 'quick_office_setup',
                'value' => 'already_have',
                'created_at' => '2018-01-25 05:22:42',
                'updated_at' => '2018-01-25 05:22:42',
            ),
            44 => 
            array (
                'id' => 45,
                'business_id' => 15,
                'business_option_id' => 17,
                'key' => 'setup_internet',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:47',
                'updated_at' => '2018-01-25 05:22:47',
            ),
            45 => 
            array (
                'id' => 46,
                'business_id' => 15,
                'business_option_id' => 18,
                'key' => 'office_accessories',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:22:53',
                'updated_at' => '2018-01-25 05:22:53',
            ),
            46 => 
            array (
                'id' => 47,
                'business_id' => 15,
                'business_option_id' => 19,
                'key' => 'swot',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:01',
                'updated_at' => '2018-01-25 05:23:01',
            ),
            47 => 
            array (
                'id' => 48,
                'business_id' => 15,
                'business_option_id' => 20,
                'key' => 'customer_analysis',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:06',
                'updated_at' => '2018-01-25 05:23:06',
            ),
            48 => 
            array (
                'id' => 49,
                'business_id' => 15,
                'business_option_id' => 21,
                'key' => 'demographic_events',
                'value' => 'https://godaddy.com/register',
                'created_at' => '2018-01-25 05:23:12',
                'updated_at' => '2018-01-25 05:23:12',
            ),
            49 => 
            array (
                'id' => 50,
                'business_id' => 15,
                'business_option_id' => 22,
                'key' => 'social_media_execution',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:19',
                'updated_at' => '2018-01-25 05:23:19',
            ),
            50 => 
            array (
                'id' => 51,
                'business_id' => 15,
                'business_option_id' => 23,
                'key' => 'budget',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:27',
                'updated_at' => '2018-01-25 05:23:27',
            ),
            51 => 
            array (
                'id' => 52,
                'business_id' => 15,
                'business_option_id' => 24,
                'key' => 'legal_adviser',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:38',
                'updated_at' => '2018-01-25 05:23:38',
            ),
            52 => 
            array (
                'id' => 53,
                'business_id' => 15,
                'business_option_id' => 25,
                'key' => 'employment_contracts_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:45',
                'updated_at' => '2018-01-25 05:23:45',
            ),
            53 => 
            array (
                'id' => 54,
                'business_id' => 15,
                'business_option_id' => 26,
                'key' => 'award_wages',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:51',
                'updated_at' => '2018-01-25 05:23:51',
            ),
            54 => 
            array (
                'id' => 55,
                'business_id' => 15,
                'business_option_id' => 27,
                'key' => 'hr_policy_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:23:58',
                'updated_at' => '2018-01-25 05:23:58',
            ),
            55 => 
            array (
                'id' => 56,
                'business_id' => 15,
                'business_option_id' => 28,
                'key' => 'book_keeping_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:24:06',
                'updated_at' => '2018-01-25 05:24:06',
            ),
            56 => 
            array (
                'id' => 57,
                'business_id' => 15,
                'business_option_id' => 29,
                'key' => 'cash_flow_forecasting_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:28:33',
                'updated_at' => '2018-01-25 05:28:33',
            ),
            57 => 
            array (
                'id' => 58,
                'business_id' => 15,
                'business_option_id' => 30,
                'key' => 'office_space_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:28:40',
                'updated_at' => '2018-01-25 05:28:40',
            ),
            58 => 
            array (
                'id' => 59,
                'business_id' => 15,
                'business_option_id' => 31,
                'key' => 'store_lease_option',
                'value' => 'yes',
                'created_at' => '2018-01-25 05:28:46',
                'updated_at' => '2018-01-25 05:28:46',
            ),
        ));
        
        
    }
}