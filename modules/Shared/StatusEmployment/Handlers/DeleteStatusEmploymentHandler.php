<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Handlers;

use Modules\Shared\StatusEmployment\Repositories\StatusEmploymentRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteStatusEmploymentHandler
{
    public function __construct(
        private StatusEmploymentRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteStatusEmployment($id);
    }
}
