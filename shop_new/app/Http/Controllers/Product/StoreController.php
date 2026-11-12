<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        
        $data = $request->validated();
        $productImages = $data['product_images'];
       
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        if(isset($data['tags']) && isset($data['colors']))
        {
            $tagsIds = $data['tags'];
            $colorsIds = $data['colors'];
            unset($data['tags'], $data['colors']);
        }
        unset($data['product_images']);
      
        
        $product = Product::firstOrCreate($data);
      

        foreach($tagsIds as $tagsId){
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagsId,
            ]);
        }
        foreach($colorsIds as $colorsId){
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId,
            ]);
        }
        $currentImageCount = ProductImage::where('product_id', $product->id)->count();

        foreach ($productImages as $productImage) {
            if ($currentImageCount > 3) {
                continue;
            }
            
            $filePath = Storage::disk('public')->put('/images', $productImage);
          
            $newImage = ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
            
            $currentImageCount++; // Збільшуємо лічильник зображень для даного продукту
           
        }


        return redirect()->route('product.index');
    }
}
