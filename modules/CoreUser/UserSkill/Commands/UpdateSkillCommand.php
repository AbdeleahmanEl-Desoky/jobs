<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateSkillCommand
{
    public function __construct(
        private UuidInterface $id,
        private UuidInterface $user_id,
        private ?string $name,
        private ?string $description,
        private ?UuidInterface $skill_id
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return array_filter([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'skill_id' => $this->skill_id
        ]);
    }
}
