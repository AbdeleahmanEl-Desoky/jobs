<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateJobDTO
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
