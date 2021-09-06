<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(100)->create();
        foreach ($posts as $post)
        {
            $post->categories()->sync(Arr::random(Category::query()->get()->pluck('id')->toArray()));
            $post->tags()->sync(Arr::random(Tag::get()->pluck('id')->toArray()));
        }
    }
}
