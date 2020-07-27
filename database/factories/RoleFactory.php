<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $routes = adminRoute();
    return [
        'name' => 'Admin',
        'permissions' => json_encode($routes),
    ];
});
