<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }
}
