<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
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

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'slug' => $faker->sentence,
        'body' => $faker->paragraph,
       
    ];
});

$factory->define(\App\Thread::class, function ($faker) {
    return [
        'user_id' => function () {
            return factory ('App\User')->create()->id;
        },
        'channel_id' => function () {
        return factory('App\Channel')->create()->id;
        },
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
        
    ];
});

$factory->define(\App\Channel::class, function ($faker) {
    $name = $faker->word;
    
    return [
'name' => $name,
'slug' -> $name
    ];
});

$factory->define(\App\Reply::class, function ($faker) {
    return [
        'thread_id' => function () {
            return factory('App\Thread')->create()->id;
        },
    'user_id' => function () {
        return factory('App\User')->create()->id;
    },
    'body' => $faker->paragraph
];
});


