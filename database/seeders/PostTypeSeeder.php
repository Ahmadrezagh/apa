<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_types = [
            [
                'name' => 'خدمات'
            ],
            [
                'name' => 'محصولات'
            ],
            [
                'name' => 'آموزش'
            ],
            [
                'name' => 'اخبار'
            ],
            [
                'name' => 'جشنواره'
            ],
        ];
        foreach ($post_types as $post_type)
        {
            PostType::create($post_type);
        }
    }
}
