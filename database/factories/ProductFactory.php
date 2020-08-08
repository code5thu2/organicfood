<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'price' => 45000,
        'sale' => 0,
        'image' => 'do-xanh.jpg',
        'description' => 'Sản phẩm rau củ quả',
        'content' => $faker->text($maxNbChars = 2000),
        'status' => 1,
        'category_id' => 6,
        'supplier_id' => 1,
        'unit_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
