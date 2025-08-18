<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Handlers;

use Modules\CoreUser\Saved\Commands\UpdateSavedCommand;
use Modules\CoreUser\Saved\Repositories\SavedRepository;

class UpdateSavedHandler
{
    public function __construct(
        private SavedRepository $repository,
    ) {
    }

    public function handle(UpdateSavedCommand $updateSavedCommand)
    {
        $this->repository->updateSaved($updateSavedCommand->getId(), $updateSavedCommand->toArray());
    }
}
