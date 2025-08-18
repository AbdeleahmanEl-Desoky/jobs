<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Handlers;

use Modules\CoreUser\Saved\Repositories\SavedRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteSavedHandler
{
    public function __construct(
        private SavedRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteSaved($id);
    }
}
