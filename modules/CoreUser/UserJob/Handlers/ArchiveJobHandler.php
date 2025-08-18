<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Handlers;

use Modules\CoreUser\UserJob\Commands\ArchiveJobCommand;
use Modules\CoreUser\UserJob\Repositories\UserJobRepository;

class ArchiveJobHandler
{
    public function __construct(
        private UserJobRepository $userJobRepository,
    ) {
    }

    public function handle(ArchiveJobCommand $command): void
    {
        $applyJob = $this->userJobRepository->archiveJob($command->getId(), $command);
    }
}
