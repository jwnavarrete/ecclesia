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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Menu::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    $menus = App\Models\Menu::all();
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'order' => 0
    ];
});