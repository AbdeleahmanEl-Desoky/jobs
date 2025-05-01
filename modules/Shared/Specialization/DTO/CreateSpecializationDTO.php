<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateSpecializationDTO
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
