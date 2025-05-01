<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\JobTitle\Models\JobTitle;

/** @extends Factory<JobTitle> */
class JobTitleFactory extends Factory
{
    protected $model = JobTitle::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
