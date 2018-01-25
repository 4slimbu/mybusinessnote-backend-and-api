<?php

use App\Models\AffiliateLink;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(AffiliateLink::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement([4, 5, 9]),
        'name' => $faker->company,
        'description' => $faker->sentence,
        'link' => $faker->url,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
