<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Services;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreUser\UserJob\Repositories\UserJobRepository;
use Ramsey\Uuid\UuidInterface;

class UserJobCRUDService
{
    public function __construct(
        private UserJobRepository $repository,
    ) {
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): EmployeeJob
    {
        return $this->repository->getUserJob(
            id: $id,
        );
    }
}
