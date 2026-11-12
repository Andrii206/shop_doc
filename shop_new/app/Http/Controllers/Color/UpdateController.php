<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Color $color, UpdateRequest $request)
    {
        $data = $request->validated();
        $color->update($data);
        return redirect()->route('color.show', $color->id);
    }
}
