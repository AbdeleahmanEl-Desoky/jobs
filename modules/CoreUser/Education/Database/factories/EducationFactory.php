<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\Education\Models\Education;

/** @extends Factory<Education> */
class EducationFactory extends Factory
{
    protected $model = Education::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
