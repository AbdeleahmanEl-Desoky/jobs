<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Handlers;

use Modules\Shared\JobTitle\Repositories\JobTitleRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteJobTitleHandler
{
    public function __construct(
        private JobTitleRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteJobTitle($id);
    }
}
