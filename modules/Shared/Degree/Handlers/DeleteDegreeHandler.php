<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Handlers;

use Modules\Shared\Degree\Repositories\DegreeRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteDegreeHandler
{
    public function __construct(
        private DegreeRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteDegree($id);
    }
}
