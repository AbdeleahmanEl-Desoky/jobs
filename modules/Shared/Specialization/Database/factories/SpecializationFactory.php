<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\Specialization\Models\Specialization;

/** @extends Factory<Specialization> */
class SpecializationFactory extends Factory
{
    protected $model = Specialization::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
