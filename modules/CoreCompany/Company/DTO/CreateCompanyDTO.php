<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateCompanyDTO
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
