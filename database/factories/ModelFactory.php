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
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => factory('App\User')->create()->id,
        'name'        => strtolower($faker->words($faker->numberBetween(1,4), true)),
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
    $path = $faker->image(public_path('img/faker'));
    $name = class_basename($path);
    $thumbnail = Image::make($path)
        ->fit(200)
        ->save(dirname($path) . "/tn-{$name}");
    return [
        'event_id'       => factory('App\Event')->create()->id,
        'name'           => $name,
        'path'           => str_replace(public_path() .'/', "", $path),
        'thumbnail_path' => str_replace(public_path() .'/', "",$thumbnail->dirname . "/" . $thumbnail->basename),
        'event_main'     => 0
    ];
});
