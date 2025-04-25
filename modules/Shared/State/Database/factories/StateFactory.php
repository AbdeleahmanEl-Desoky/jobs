<?php

declare(strict_types=1);

namespace Modules\Shared\State\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\State\Models\State;

/** @extends Factory<State> */
class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
