<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Order $order, UpdateRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        return redirect()->route('order.show', $order->id);
    }
}
