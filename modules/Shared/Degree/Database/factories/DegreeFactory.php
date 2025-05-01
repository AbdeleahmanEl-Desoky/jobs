<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\Degree\Models\Degree;

/** @extends Factory<Degree> */
class DegreeFactory extends Factory
{
    protected $model = Degree::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
