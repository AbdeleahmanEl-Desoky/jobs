<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Handlers;

use Modules\CoreCompany\Job\Commands\UpdateJobCommand;
use Modules\CoreCompany\Job\Repositories\JobRepository;

class UpdateJobHandler
{
    public function __construct(
        private JobRepository $repository,
    ) {
    }

    public function handle(UpdateJobCommand $updateJobCommand)
    {
        $this->repository->updateJob($updateJobCommand->getId(), $updateJobCommand->toArray());
    }
}
