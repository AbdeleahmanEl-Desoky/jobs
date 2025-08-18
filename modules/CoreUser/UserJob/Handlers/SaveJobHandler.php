<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Handlers;

use Modules\CoreUser\UserJob\Commands\ArchiveJobCommand;
use Modules\CoreUser\UserJob\Commands\SaveJobCommand;
use Modules\CoreUser\UserJob\Repositories\UserJobRepository;

class SaveJobHandler
{
    public function __construct(
        private UserJobRepository $userJobRepository,
    ) {
    }

    public function handle(SaveJobCommand $command): void
    {
        $applyJob = $this->userJobRepository->saveJob($command->getId(), $command);
    }
}
