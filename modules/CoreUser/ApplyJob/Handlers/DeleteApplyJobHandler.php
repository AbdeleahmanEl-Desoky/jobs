<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Handlers;

use Modules\CoreUser\ApplyJob\Repositories\ApplyJobRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteApplyJobHandler
{
    public function __construct(
        private ApplyJobRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteApplyJob($id);
    }
}
