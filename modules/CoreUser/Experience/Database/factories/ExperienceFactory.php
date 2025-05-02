<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\Experience\Models\Experience;

/** @extends Factory<Experience> */
class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
