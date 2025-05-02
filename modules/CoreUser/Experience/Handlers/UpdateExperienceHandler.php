<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Handlers;

use Modules\CoreUser\Experience\Commands\UpdateExperienceCommand;
use Modules\CoreUser\Experience\Repositories\ExperienceRepository;

class UpdateExperienceHandler
{
    public function __construct(
        private ExperienceRepository $repository,
    ) {
    }

    public function handle(UpdateExperienceCommand $updateExperienceCommand)
    {
        $this->repository->updateExperience($updateExperienceCommand->getId(), $updateExperienceCommand->toArray());
    }
}
