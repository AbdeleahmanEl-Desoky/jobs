<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\CompanySize\Models\CompanySize;

/** @extends Factory<CompanySize> */
class CompanySizeFactory extends Factory
{
    protected $model = CompanySize::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
