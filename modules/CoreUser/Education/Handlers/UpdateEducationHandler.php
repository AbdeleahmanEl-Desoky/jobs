<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Handlers;

use Modules\CoreUser\Education\Commands\UpdateEducationCommand;
use Modules\CoreUser\Education\Repositories\EducationRepository;

class UpdateEducationHandler
{
    public function __construct(
        private EducationRepository $repository,
    ) {
    }

    public function handle(UpdateEducationCommand $updateEducationCommand)
    {
        $this->repository->updateEducation($updateEducationCommand->getId(), $updateEducationCommand->toArray());
    }
}
