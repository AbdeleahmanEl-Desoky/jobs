<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Handlers;

use Modules\Shared\Field\Repositories\FieldRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteFieldHandler
{
    public function __construct(
        private FieldRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteField($id);
    }
}
