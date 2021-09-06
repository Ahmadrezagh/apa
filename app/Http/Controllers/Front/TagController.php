<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PostType;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag)
    {
        $tag = Tag::where('name','=',$tag)->first();
        if($tag)
        {
            $posts = $tag->posts()->paginate();
            $randomItem = PostType::query()->inRandomOrder()->first();
            return view('front.tag.index',compact('tag','posts','randomItem'));
        }
        return abort(404);
    }
}
