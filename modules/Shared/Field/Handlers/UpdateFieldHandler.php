<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Handlers;

use Modules\Shared\Field\Commands\UpdateFieldCommand;
use Modules\Shared\Field\Repositories\FieldRepository;

class UpdateFieldHandler
{
    public function __construct(
        private FieldRepository $repository,
    ) {
    }

    public function handle(UpdateFieldCommand $updateFieldCommand)
    {
        $this->repository->updateField($updateFieldCommand->getId(), $updateFieldCommand->toArray());
    }
}
