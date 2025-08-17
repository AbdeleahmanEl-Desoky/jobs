<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\UserJob\Models\UserJob;

/** @extends Factory<UserJob> */
class UserJobFactory extends Factory
{
    protected $model = UserJob::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
