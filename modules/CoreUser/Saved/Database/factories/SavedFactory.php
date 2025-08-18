<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\Saved\Models\Saved;

/** @extends Factory<Saved> */
class SavedFactory extends Factory
{
    protected $model = Saved::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
