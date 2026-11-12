<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('category.show', $category->id);
    }
}
