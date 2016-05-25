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

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $date = mt_rand(strtotime('-1 year'), strtotime('+3 months'));
    $name = strtolower($faker->words($faker->numberBetween(1,4), true));
    $description = $faker->paragraphs(4, true);
    return [
        'user_id'           => mt_rand(1,4),
        'name'              => $name,
        'slug'              => str_slug($name),
        'description'       => $description,
        'description_plain' => $description,
        'feature_event'     => 0,
        'address_street_1'  => $faker->streetAddress,
        'address_street_2'  => null,
        'city'              => $faker->city,
        'state'             => $faker->stateAbbr,
        'zip'               => $faker->postcode,
        'date_start'        => $date,
        'date_end'          => strtotime(date('F d Y', $date) . ' +' . mt_rand(4,30) . ' hours'),
        'website'           => $faker->url,
        'twitter'           => $faker->url,
        'facebook'          => $faker->url,
        'eb_url'            => $faker->url,
        'facebook_id'       => $faker->md5,
        'eventbrite_id'     => $faker->md5
    ];
});

$factory->define(App\Event_Photo::class, function (Faker\Generator $faker) {
    $path = $faker->image(public_path('img/faker'));
    $name = class_basename($path);
    $thumbnail = Image::make($path)
        ->fit(200)
        ->save(dirname($path) . "/tn-{$name}");
    return [
        'event_id'       => mt_rand(1,5),
        'name'           => $name,
        'path'           => str_replace(public_path() .'/', "", $path),
        'thumbnail_path' => str_replace(public_path() .'/', "",$thumbnail->dirname . "/" . $thumbnail->basename),
        'event_main'     => 0
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name'      => mt_rand(1,5)
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name'      => mt_rand(1,5)
    ];
});

$factory->define(App\FacebookEvent::class, function (Faker\Generator $faker) {
    $date = mt_rand(strtotime('-45 days'), strtotime('+3 months'));
    $name = strtolower($faker->words($faker->numberBetween(1,4), true));
    $description = $faker->paragraphs(mt_rand(1,3), true);
    return [
        'facebook_id'    => $faker->md5,
        'name'           => $name,
        'description'    => $description,
        'category'       => $faker->word,
        'street_address' => $faker->streetAddress,
        'date_start'     => $date,
        'feature_event'  => mt_rand(0,1),
        'date_end'       => strtotime(date('F d Y', $date) . ' +' . mt_rand(4,30) . ' hours'),
    ];
});
