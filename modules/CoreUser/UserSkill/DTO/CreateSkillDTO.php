<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateSkillDTO
{
    public function __construct(
        public string $name,
        public ?string $description
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
