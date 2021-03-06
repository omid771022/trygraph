<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\User::class, function (Faker $faker) {
    return [
'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'admin'=>$faker->boolean(30),
        'password'=>$faker->password(30),
        'remember_token'=>Str::random(10)
    ];
});

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
       'title'=>$faker->sentence(6),
        'body'=>$faker->text(8),
    ];
});


$factory->define(\App\comment::class, function (Faker $faker) {
    return [

'body'=>$faker->text(50),
'approved'=>$faker->boolean(40)

   ];
});
