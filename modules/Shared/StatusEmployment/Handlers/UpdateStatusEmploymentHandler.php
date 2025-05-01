<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Handlers;

use Modules\Shared\StatusEmployment\Commands\UpdateStatusEmploymentCommand;
use Modules\Shared\StatusEmployment\Repositories\StatusEmploymentRepository;

class UpdateStatusEmploymentHandler
{
    public function __construct(
        private StatusEmploymentRepository $repository,
    ) {
    }

    public function handle(UpdateStatusEmploymentCommand $updateStatusEmploymentCommand)
    {
        $this->repository->updateStatusEmployment($updateStatusEmploymentCommand->getId(), $updateStatusEmploymentCommand->toArray());
    }
}
