<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\Archived\Models\Archived;

/** @extends Factory<Archived> */
class ArchivedFactory extends Factory
{
    protected $model = Archived::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
