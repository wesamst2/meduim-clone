<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(50)
            ->has(Tag::factory()->count(5))
            ->create();
    }
}
