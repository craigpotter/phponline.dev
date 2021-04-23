<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Support\ArticleLevel;
use App\Support\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'title' => $this->faker->unique()->text(60),
            'summary' => $this->faker->unique()->text(160),
            'body' => $this->faker->paragraphs(4, true),
            'status' => Arr::random(ArticleStatus::ALL),
            'level' => Arr::random(ArticleLevel::ALL),
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
        ];
    }
}
