<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Handlers;

use Modules\CoreUser\ApplyJob\Commands\ArchiveApplyJobCommand;
use Modules\CoreUser\ApplyJob\Repositories\ApplyJobRepository; // To fetch the ApplyJob
use App\Models\Archived; // Import Archived model
use Illuminate\Support\Carbon; // For timestamp

class ArchiveApplyJobHandler
{
    public function __construct(
        private ApplyJobRepository $applyJobRepository,
    ) {
    }

    public function handle(ArchiveApplyJobCommand $command): void
    {
        $applyJob = $this->applyJobRepository->archiveApplyJob($command->getId(), $command);
    }
}
