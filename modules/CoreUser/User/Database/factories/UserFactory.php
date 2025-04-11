<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\User\Models\User;

/** @extends Factory<User> */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
