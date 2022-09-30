<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'brief' => $this->faker->text(),
            'description' => $this->faker->paragraph(150),
            'image' => $this->faker->imageUrl(),
            'user_id' => 1
        ];
    }
}
