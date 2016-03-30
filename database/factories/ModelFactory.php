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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => $faker->numberBetween(1,3),
        'name'        => $faker->text(30),
        'description' => $faker->paragraphs(2, true),
        'street'      => $faker->streetAddress,
        'city'        => $faker->city,
        'state'       => $faker->stateAbbr,
        'zip'         => $faker->postcode,
        'date_start'  => $faker->unixTime(),
        'date_end'    => $faker->unixTime('+4 hours'),
        'website'     => $faker->domainName,
//        'twitter' => $faker->name,
//        'facebook' => $faker->name,
//        'instagram' => $faker->name,
    ];
});

$factory->define(App\Event_Photo::class, function (Faker\Generator $faker) {
    return [
        'event_id'       => $faker->numberBetween(1,10),
        'name'           => $faker->image('/tmp', 640, 480, 'cats'),
        'path'           => $faker->imageUrl(),
        'thumbnail_path' => $faker->imageUrl(200,200),
        'event_main'     => 0
    ];
});
