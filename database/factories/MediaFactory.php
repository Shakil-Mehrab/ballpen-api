<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_type' => 'user',
            'model_id' => User::all()->random()->id,
            'collection_name' => 'default',
            'name' => Media::all()->random()->id,
            'teaser' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => 'draft',
        ];
    }
}
