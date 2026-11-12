<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Group;
use App\Models\Color;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        Group::factory(10)->create();
        $products = Product::factory(100)->create();
        $users = User::factory(10)->create();
        $colors = Color::factory(10)->create();
        $tags = Tag::factory(10)->create();

        foreach($products as $product){
            $colorIds = $colors->random(5)->pluck('id');
            $product->colors()->attach($colorIds);
        }
        foreach($products as $product){
            $tagIds = $colors->random(5)->pluck('id');
            $product->tags()->attach($tagIds);
        }
        foreach ($products as $product) {
            $colorIds = $colors->random(5)->pluck('id')->toArray();
            $product->colors()->sync($colorIds);
        }
    }
}
