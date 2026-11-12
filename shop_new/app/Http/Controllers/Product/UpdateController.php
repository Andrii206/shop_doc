<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use App\Models\ProductImage;

class UpdateController extends Controller
{
    public function __invoke(Product $product, UpdateRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        
        

        if(isset($data['tags']))
        {
            $product->tags()->sync($data['tags']);
            unset($data['tags']);
        }
    
        if(isset($data['colors']))
        {
            $product->colors()->sync($data['colors']);
            unset($data['colors']);
        }

        $currentImageCount = ProductImage::where('product_id', $product->id)->count();

        foreach ($data['product_images'] as $productImage) {
            if ($currentImageCount > 3) {
                continue;
            }
            
            $filePath = Storage::disk('public')->put('/images', $productImage);
          
            $newImage = ProductImage::firstOrCreate([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
            
            $currentImageCount++; // Збільшуємо лічильник зображень для даного продукту
           
        }
        unset($data['product_images']);

        $product->update($data);
    
        
    
        return redirect()->route('product.show', $product->id);
    }
    
}
