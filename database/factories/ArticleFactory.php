<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->sentence,
            'slug' => Str::slug($title),
            'kicker' => $this->faker->word,
            'user_id' => User::all()->random()->id,
            'thumbnail_id' => Media::all()->random()->id,
            'teaser' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => 'draft',
        ];
    }
}
