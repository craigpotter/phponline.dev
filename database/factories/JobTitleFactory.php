<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobTitleFactory extends Factory
{
    protected $model = JobTitle::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->jobTitle,
        ];
    }
}
