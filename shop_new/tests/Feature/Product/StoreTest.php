<?php

namespace Tests\Feature\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_can_successfully_store_product_with_images_and_relations(): void
    {
        $category = Category::factory()->create();
        $tag1 = Tag::factory()->create();
        $tag2 = Tag::factory()->create();
        $color = Color::factory()->create();

        $previewImage = UploadedFile::fake()->create('preview.jpg', 200, 'image/jpeg');

        $galleryImages = [
            UploadedFile::fake()->create('gallery1.jpg', 200, 'image/jpeg'),
            UploadedFile::fake()->create('gallery2.jpg', 200, 'image/jpeg'),
        ];

        $payload = [
            'title' => 'Чоловічі кросівки Nike',
            'description' => 'Опис товару для тесту',
            'content' => 'Детальний контент',
            'price' => 2500,
            'count' => 10,
            'is_published' => 1,
            'category_id' => $category->id,
            'preview_image' => $previewImage,
            'product_images' => $galleryImages,
            'tags' => [$tag1->id, $tag2->id],
            'colors' => [$color->id],
        ];

        $response = $this->post(route('product.store'), $payload);

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', [
            'title' => 'Чоловічі кросівки Nike',
            'price' => 2500,
            'category_id' => $category->id,
        ]);

        $product = Product::first();

        $this->assertTrue(Storage::disk('public')->exists($product->preview_image));

        $this->assertDatabaseHas('product_tags', [
            'product_id' => $product->id,
            'tag_id' => $tag1->id,
        ]);
        $this->assertDatabaseHas('color_products', [
            'product_id' => $product->id,
            'color_id' => $color->id,
        ]);

        $this->assertDatabaseCount('product_images', 2);

        $disk = Storage::disk('public');

        $savedImages = ProductImage::where('product_id', $product->id)->get();
        foreach ($savedImages as $image) {
            $disk->assertExists($image->file_path);
        }
    }

    public function test_enforces_maximum_images_limit(): void
    {
        $category = Category::factory()->create();
        $tag = Tag::factory()->create();
        $color = Color::factory()->create();

        $manyImages = [
            UploadedFile::fake()->create('img1.jpg', 100, 'image/jpeg'),
            UploadedFile::fake()->create('img2.jpg', 100, 'image/jpeg'),
            UploadedFile::fake()->create('img3.jpg', 100, 'image/jpeg'),
            UploadedFile::fake()->create('img4.jpg', 100, 'image/jpeg'),
            UploadedFile::fake()->create('img5.jpg', 100, 'image/jpeg'),
            UploadedFile::fake()->create('img6.jpg', 100, 'image/jpeg'),
        ];

        $payload = [
            'title' => 'Товар з великою кількістю фото',
            'description' => 'Тест ліміту зображень',
            'content' => 'Контент',
            'price' => 1200,
            'count' => 5,
            'category_id' => $category->id,
            'preview_image' => UploadedFile::fake()->create('preview.jpg', 200, 'image/jpeg'),
            'product_images' => $manyImages,
            'tags' => [$tag->id],
            'colors' => [$color->id],
        ];

        $this->post(route('product.store'), $payload);

        $product = Product::first();

        $savedImagesCount = ProductImage::where('product_id', $product->id)->count();
        $this->assertLessThanOrEqual(4, $savedImagesCount);
    }

    public function test_validation_fails_if_required_fields_are_missing(): void
    {
        $response = $this->post(route('product.store'), []);

        $response->assertSessionHasErrors([
            'title',
            'description',
            'content',
            'preview_image',
        ]);

        $this->assertDatabaseCount('products', 0);
    }
}
