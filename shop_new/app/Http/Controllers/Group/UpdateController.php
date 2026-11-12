<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Group $group, UpdateRequest $request)
    {
        $data = $request->validated();
        $group->update($data);
        return redirect()->route('group.show', $group->id);
    }
}
