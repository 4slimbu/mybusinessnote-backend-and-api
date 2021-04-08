<?php

use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'user_id'                => function () {
            return User::select('id')->get()->random()->id;
        },
        'business_category_id'   => function () {
            return BusinessCategory::select('id')->get()->random()->id;
        },
        'business_name'          => $faker->company,
        'website'                => $faker->domainName,
        'abn'                    => $faker->ean13,
        'acn'                    => $faker->ean13,
        'business_email'         => $faker->safeEmail,
        'business_mobile'        => $faker->phoneNumber,
        'business_general_phone' => $faker->phoneNumber,
        'address'                => $faker->address,
    ];
});
