<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateCompanySizeDTO
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
