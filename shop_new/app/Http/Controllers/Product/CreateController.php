<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();
        return view('admin.product.create', compact('tags', 'colors', 'categories', 'groups'));
    }
}
