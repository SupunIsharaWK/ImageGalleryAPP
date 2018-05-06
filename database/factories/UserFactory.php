<?php

use App\UnsplashImage;
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
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(UnsplashImage::class, function (Faker $faker) {

    $image_id = str_random(11);
    $ran_ststus_select = [UnsplashImage::NOT_FAVOURITE,UnsplashImage::FAVOURITE];
    $ran_status = $ran_ststus_select[array_rand($ran_ststus_select, 1)];
    return [
        'image_id' => $image_id,
        'width' => random_int(1,5),
        'height' => random_int(1,5),
        'color' => $faker->hexColor,
        'regularImageURL'=>$faker->imageUrl(640, 480),
        'favouriteStatus'=>$ran_status,
        'description' => $faker->text(200),
    ];
});
