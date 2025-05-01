<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\StatusEmployment\Models\StatusEmployment;

/** @extends Factory<StatusEmployment> */
class StatusEmploymentFactory extends Factory
{
    protected $model = StatusEmployment::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
