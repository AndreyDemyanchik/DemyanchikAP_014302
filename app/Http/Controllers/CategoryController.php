<?php

namespace App\Http\Controllers;

use App\Models\Visualization;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function all()
    {
        return response()->json(Category::all());
    }
}
