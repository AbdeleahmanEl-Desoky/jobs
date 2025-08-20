<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateSkillDTO
{
    public function __construct(
        public string $name,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
