<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Handlers;

use Modules\Shared\JobTitle\Commands\UpdateJobTitleCommand;
use Modules\Shared\JobTitle\Repositories\JobTitleRepository;

class UpdateJobTitleHandler
{
    public function __construct(
        private JobTitleRepository $repository,
    ) {
    }

    public function handle(UpdateJobTitleCommand $updateJobTitleCommand)
    {
        $this->repository->updateJobTitle($updateJobTitleCommand->getId(), $updateJobTitleCommand->toArray());
    }
}
