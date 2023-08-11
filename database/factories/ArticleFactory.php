<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(20),
            'slug' => fake()->slug,
            'category_id' => ArticleCategory::factory(),
            'image' => null,
            'content' => fake()->paragraph,
            'active' => 1,
            'sort' => rand(1,20),
        ];
    }
}
