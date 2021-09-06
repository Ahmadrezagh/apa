<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'تست نفوذ و امنیت'
            ],
            [
                'name' => 'امنیت شبکه'
            ],
            [
                'name' => 'سواد رسانه ای'
            ],
            [
                'name' => 'مهندسی اجتماعی'
            ],
            [
                'name' => 'هک'
            ],
            [
                'name' => 'اخطار های امنیتی'
            ],
        ];
        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}
