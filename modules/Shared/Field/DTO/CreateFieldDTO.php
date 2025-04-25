<?php

declare(strict_types=1);

namespace Modules\Shared\Field\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateFieldDTO
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
