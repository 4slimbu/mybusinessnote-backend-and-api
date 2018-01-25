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
        ));
        
        
    }
}