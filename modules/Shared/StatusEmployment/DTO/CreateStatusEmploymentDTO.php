<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateStatusEmploymentDTO
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
