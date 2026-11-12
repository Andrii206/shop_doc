<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;



class IndexController extends Controller
{
    public function __invoke()
    {
        $order = Order::all();
        return view('admin.main.index');
    }
}
