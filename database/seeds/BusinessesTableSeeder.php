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
        
        \DB::table('businesses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 7,
                'business_category_id' => 7,
                'business_name' => 'Sporer, Sauer and Pfeffer',
                'website' => 'will.com',
                'abn' => '8039398689919',
                'acn' => '6124753723741',
                'business_email' => 'ray53@example.com',
            'business_mobile' => '(686) 616-6840 x382',
            'business_general_phone' => '(789) 362-5533',
                'address' => '4135 Oma Bridge Suite 750Port Jayme, NY 08441',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:14:43',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'business_category_id' => 3,
                'business_name' => 'Zemlak and Sons',
                'website' => 'cormier.net',
                'abn' => '1395043490659',
                'acn' => '2298730831263',
                'business_email' => 'oortiz@example.com',
                'business_mobile' => '581.329.1792 x9917',
                'business_general_phone' => '594.232.0170',
                'address' => '59686 Langworth Street Apt. 769Domenicstad, WA 11225-5734',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:14:24',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 6,
                'business_category_id' => 7,
                'business_name' => 'Conn, Gottlieb and Armstrong',
                'website' => 'schimmel.com',
                'abn' => '0130410251546',
                'acn' => '7740861810129',
                'business_email' => 'cedrick27@example.org',
                'business_mobile' => '498-769-0221 x85792',
                'business_general_phone' => '915-964-3435 x44229',
                'address' => '963 Schoen ForgeTessiechester, NC 11216',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:14:12',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 8,
                'business_category_id' => 1,
                'business_name' => 'Ratke-Raynor',
                'website' => 'williamson.net',
                'abn' => '9832664714464',
                'acn' => '7929153944852',
                'business_email' => 'gutkowski.quentin@example.net',
            'business_mobile' => '(512) 628-1550',
            'business_general_phone' => '(386) 686-5260 x7027',
                'address' => '92061 Kiehn TrafficwayMarksside, NV 16566',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:13:47',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 7,
                'business_category_id' => 1,
                'business_name' => 'Kuhic and Sons',
                'website' => 'stehr.info',
                'abn' => '7628000398892',
                'acn' => '2086341746386',
                'business_email' => 'luettgen.cade@example.com',
                'business_mobile' => '1-267-550-0346 x1169',
                'business_general_phone' => '1-828-429-4872 x046',
                'address' => '181 Runolfsson Field Apt. 560Rollinville, PA 66505',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:13:34',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 3,
                'business_category_id' => 7,
                'business_name' => 'Beier-Beer',
                'website' => 'gislason.com',
                'abn' => '9612890686731',
                'acn' => '5833969759093',
                'business_email' => 'emely12@example.org',
                'business_mobile' => '+1.978.989.0443',
                'business_general_phone' => '398.767.0153',
                'address' => '471 Moen BrookNorth Jazmyneton, CA 17593',
                'sell_goods' => NULL,
                'tagline' => NULL,
                'logo' => NULL,
                'brand_color' => NULL,
                'created_at' => '2017-11-22 09:33:17',
                'updated_at' => '2017-11-23 01:13:22',
            ),
        ));
        
        
    }
}