<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Handlers;

use Modules\CoreUser\Education\Repositories\EducationRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteEducationHandler
{
    public function __construct(
        private EducationRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteEducation($id);
    }
}
