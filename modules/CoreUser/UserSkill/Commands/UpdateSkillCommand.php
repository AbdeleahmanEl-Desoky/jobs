<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateSkillCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $name,
        private ?string $description
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
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }
}
