<?php

declare(strict_types=1);

namespace Modules\Auth\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateAuthDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $type,
        public string $phone,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'type' => $this->type,
            'phone' => $this->phone,
        ];
    }
}
