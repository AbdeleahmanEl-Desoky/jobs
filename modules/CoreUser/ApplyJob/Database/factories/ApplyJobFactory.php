<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;

/** @extends Factory<ApplyJob> */
class ApplyJobFactory extends Factory
{
    protected $model = ApplyJob::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
