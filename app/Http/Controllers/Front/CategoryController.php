<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        $randomItem = PostType::query()->inRandomOrder()->first();
        return view('front.category.index',compact('posts','category','randomItem'));
    }

}
