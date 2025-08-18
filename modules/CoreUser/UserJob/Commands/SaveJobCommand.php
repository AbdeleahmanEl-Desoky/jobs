<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Commands;

use Ramsey\Uuid\UuidInterface;

class SaveJobCommand
{
    public function __construct(
        private UuidInterface $id,
        private UuidInterface $userId
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getUserId(): UuidInterface
    {
        return $this->userId;
    }
}
