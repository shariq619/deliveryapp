<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Admin\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->name;
    $slug = Str::slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        'description' => $faker->sentence(10),
        'price' => $faker->numberBetween(10, 500),
    ];
});
