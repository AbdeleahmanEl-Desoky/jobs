<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Handlers;

use Modules\Shared\Specialization\Repositories\SpecializationRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteSpecializationHandler
{
    public function __construct(
        private SpecializationRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteSpecialization($id);
    }
}
