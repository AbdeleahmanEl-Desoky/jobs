<?php

declare(strict_types=1);

namespace Modules\Shared\State\Handlers;

use Modules\Shared\State\Commands\UpdateStateCommand;
use Modules\Shared\State\Repositories\StateRepository;

class UpdateStateHandler
{
    public function __construct(
        private StateRepository $repository,
    ) {
    }

    public function handle(UpdateStateCommand $updateStateCommand)
    {
        $this->repository->updateState($updateStateCommand->getId(), $updateStateCommand->toArray());
    }
}
