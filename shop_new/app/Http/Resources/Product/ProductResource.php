<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Product\ProductImageResource;
use App\Http\Resources\Product\ProductColorResource;
use App\Http\Resources\Product\ProductMinResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = Product::where('group_id', $this->group_id)->get();


        return [
            'id'=> $this->id, 
            'title'=> $this->title, 
            'description' => $this->description, 
            'content' => $this->content, 
            'image_url' => $this->imageUrl, 
            'price' => $this->price, 
            'count' => $this->count, 
            'is_published' => $this->is_published, 
            'product_images' => ProductImageResource::collection($this->productImages),
            'colors' => ColorResource::collection($this->colors),
            'tags' => TagResource::collection($this->tags),
            'category' => new CategoryResource($this->category), 
            'group_products' => ProductMinResource::collection($products),
            

        ];
    }
}
