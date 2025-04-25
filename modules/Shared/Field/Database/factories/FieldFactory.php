<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\Field\Models\Field;

/** @extends Factory<Field> */
class FieldFactory extends Factory
{
    protected $model = Field::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
