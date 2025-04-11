<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreCompany\Company\Models\Company;

/** @extends Factory<Company> */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
