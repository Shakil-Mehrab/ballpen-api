<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ArticleRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(10, function ($number) {
            Article::inRandomOrder()->first()->regions()->syncWithoutDetaching(Region::inRandomOrder()->first());
        });
    }
}
