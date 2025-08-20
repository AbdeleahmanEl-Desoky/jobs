<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateSkillDTO
{
    public function __construct(
        public UuidInterface $user_id,
        public ?string $name,
        public ?string $description,
        public ?UuidInterface $skill_id
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'skill_id' => $this->skill_id
        ];
    }
}
