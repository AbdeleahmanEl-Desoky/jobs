<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\Category\Models\Category;

/** @extends Factory<Category> */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
