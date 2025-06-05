<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Handlers;

use Modules\CoreCompany\Job\Repositories\JobRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteJobHandler
{
    public function __construct(
        private JobRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteJob($id);
    }
}
