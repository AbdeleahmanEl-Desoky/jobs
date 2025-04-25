<?php

declare(strict_types=1);

namespace Modules\Shared\City\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\City\Models\City;

/** @extends Factory<City> */
class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
