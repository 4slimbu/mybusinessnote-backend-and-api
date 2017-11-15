<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->company,
        'password' => $password ?: $password = bcrypt('secret'),
        'verified' => true,
        'role_id' => 2,
        'remember_token' => str_random(10),
    ];
});




$factory->define(App\Models\Business::class, function( Faker $faker) {

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
