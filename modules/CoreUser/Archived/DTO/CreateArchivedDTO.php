<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateArchivedDTO
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
