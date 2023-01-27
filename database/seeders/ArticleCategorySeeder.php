<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(100, function ($number) {
            Article::inRandomOrder()->first()->categories()->syncWithoutDetaching(Category::inRandomOrder()->first());
        });
    }
}
