<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Handlers;

use Modules\CoreUser\ApplyJob\Commands\UpdateApplyJobCommand;
use Modules\CoreUser\ApplyJob\Repositories\ApplyJobRepository;

class UpdateApplyJobHandler
{
    public function __construct(
        private ApplyJobRepository $repository,
    ) {
    }

    public function handle(UpdateApplyJobCommand $updateApplyJobCommand)
    {
        $this->repository->updateApplyJob($updateApplyJobCommand->getId(), $updateApplyJobCommand->toArray());
    }
}
