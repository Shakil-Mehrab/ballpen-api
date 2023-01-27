<?php

namespace Database\Seeders;

use App\Models\Pin;
use Illuminate\Database\Seeder;

class PinnedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 11; $i++) {
            Pin::create([
                'article_id' => null,
            ]);
        }
    }
}
