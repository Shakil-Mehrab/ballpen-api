<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(10, function ($number) {
            Article::inRandomOrder()->first()->tags()->syncWithoutDetaching(Tag::inRandomOrder()->first());
        });
    }
}
