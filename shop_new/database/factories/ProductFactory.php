<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductImage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->text,
            'preview_image' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(100, 10000), 
            'count' => $this->faker->numberBetween(0, 100), 
            'is_published' => $this->faker->boolean(80), 
            'category_id' => Category::get()->random()->id,
            'group_id' => Group::get()->random()->id,
        ];
    }
    /**
     * Indicate that the product has product images.
     *
     * @param  int  $count
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withProductImages($count = 1)
    {
        return $this->hasAttached(ProductImage::factory()->count($count), []);
    }
}
