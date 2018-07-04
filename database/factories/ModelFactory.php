<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Intervention\Image\Facades\Image;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Officer::class, function (Faker\Generator $faker) {
    return [
        'first_name'  => $faker->firstName(),
        'last_name'   => $faker->lastName,
        'bio'         => $faker->text(),
        'position_id' => $faker->numberBetween(1,8),
        'linkedin'    => $faker->lexify('https://www.linkedin.com/?????????'),
        'facebook'    => $faker->lexify('https://www.facebook.com/?????????'),
        'twitter'    => $faker->lexify('https://www.twitter.com/?????????'),
        'img_profile' => $faker->imageUrl()
    ];
});


