<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Handlers;

use Modules\CoreUser\Experience\Repositories\ExperienceRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteExperienceHandler
{
    public function __construct(
        private ExperienceRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteExperience($id);
    }
}
