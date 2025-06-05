<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreCompany\Job\Models\Job;

/** @extends Factory<Job> */
class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
