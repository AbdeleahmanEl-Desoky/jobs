<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Commands;

use Ramsey\Uuid\UuidInterface;

class ArchiveApplyJobCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $userId,
        private ?string $reason = null,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }
}
