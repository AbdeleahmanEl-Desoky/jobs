<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shared\Skill\Models\Skill;

/** @extends Factory<Skill> */
class SkillFactory extends Factory
{
    protected $model = Skill::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
