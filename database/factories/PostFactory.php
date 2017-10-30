<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => 'factory title',
        'author' => 'factory author',
        'content' => 'factory content'
    ];
});
