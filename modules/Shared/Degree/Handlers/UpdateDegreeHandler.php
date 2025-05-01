<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Handlers;

use Modules\Shared\Degree\Commands\UpdateDegreeCommand;
use Modules\Shared\Degree\Repositories\DegreeRepository;

class UpdateDegreeHandler
{
    public function __construct(
        private DegreeRepository $repository,
    ) {
    }

    public function handle(UpdateDegreeCommand $updateDegreeCommand)
    {
        $this->repository->updateDegree($updateDegreeCommand->getId(), $updateDegreeCommand->toArray());
    }
}
