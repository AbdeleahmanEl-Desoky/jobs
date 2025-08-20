<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CoreUser\UserSkill\Models\UserSkill;

/** @extends Factory<UserSkill> */
class SkillFactory extends Factory
{
    protected $model = UserSkill::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
