<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Handlers;

use Modules\CoreCompany\Job\Commands\UpdateJobCommand;
use Modules\CoreCompany\Job\Repositories\JobRepository; // Using JobRepository directly now

class UpdateJobHandler
{
    public function __construct(
        private JobRepository $repository, // Assuming you inject JobRepository here
    ) {
    }

    public function handle(UpdateJobCommand $updateJobCommand): bool // Return bool from repository
    {
        return $this->repository->updateJob($updateJobCommand->getId(), $updateJobCommand);
    }
}
