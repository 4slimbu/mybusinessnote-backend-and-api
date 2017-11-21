<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Business::class, function (Faker $faker) {
    return [
        'user_id' => function () {

            return factory('App\Models\User')->create()->id;

        },
        'business_category_id' => 1,
        'badge_id' => 1,
        'business_name' => $faker->company,
        'website' => $faker->domainName,
        'abn' => $faker->ean13,
        'acn' => $faker->ean13,
        'business_email' => $faker->safeEmail,
        'business_mobile' => $faker->phoneNumber,
        'business_general_phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});
