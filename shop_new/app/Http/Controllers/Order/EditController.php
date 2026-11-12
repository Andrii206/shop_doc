<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Order;
use App\Models\Tag;
use Illuminate\Http\Request;


class EditController extends Controller
{
    public function __invoke(Order $order)
    {   
        return view('admin.order.edit', compact('order'));
    }
}
