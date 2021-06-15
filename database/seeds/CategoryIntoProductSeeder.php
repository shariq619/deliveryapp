<?php

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;

class CategoryIntoProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = Category::all();

        // Populate the pivot table
        Product::all()->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
