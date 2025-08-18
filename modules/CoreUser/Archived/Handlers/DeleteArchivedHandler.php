<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Handlers;

use Modules\CoreUser\Archived\Repositories\ArchivedRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteArchivedHandler
{
    public function __construct(
        private ArchivedRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteArchived($id);
    }
}
