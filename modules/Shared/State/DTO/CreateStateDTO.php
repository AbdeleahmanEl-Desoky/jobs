<?php

declare(strict_types=1);

namespace Modules\Shared\State\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateStateDTO
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
