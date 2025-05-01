<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Handlers;

use Modules\Shared\Specialization\Commands\UpdateSpecializationCommand;
use Modules\Shared\Specialization\Repositories\SpecializationRepository;

class UpdateSpecializationHandler
{
    public function __construct(
        private SpecializationRepository $repository,
    ) {
    }

    public function handle(UpdateSpecializationCommand $updateSpecializationCommand)
    {
        $this->repository->updateSpecialization($updateSpecializationCommand->getId(), $updateSpecializationCommand->toArray());
    }
}
