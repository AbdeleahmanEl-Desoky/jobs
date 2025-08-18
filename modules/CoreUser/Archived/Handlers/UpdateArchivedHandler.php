<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Handlers;

use Modules\CoreUser\Archived\Commands\UpdateArchivedCommand;
use Modules\CoreUser\Archived\Repositories\ArchivedRepository;

class UpdateArchivedHandler
{
    public function __construct(
        private ArchivedRepository $repository,
    ) {
    }

    public function handle(UpdateArchivedCommand $updateArchivedCommand)
    {
        $this->repository->updateArchived($updateArchivedCommand->getId(), $updateArchivedCommand->toArray());
    }
}
