<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Color\ColorResource;

class IndexProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'id'=> $this->id, 
            'title'=> $this->title, 
            'description' => $this->description, 
            'content' => $this->content, 
            'image_url' => $this->imageUrl, 
            'price' => $this->price, 
            'count' => $this->count, 
            'is_published' => $this->is_published, 
            'colors' => ColorResource::collection($this->colors),
            'category' => new CategoryResource($this->category), 
            

        ];
    }
}
