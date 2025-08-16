<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Services;

use Illuminate\Support\Collection;
use Modules\CoreCompany\Job\DTO\CreateJobDTO;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreCompany\Job\Repositories\JobRepository;
use Ramsey\Uuid\UuidInterface;

class JobCRUDService
{
    public function __construct(
        private JobRepository $repository,
    ) {}

    public function create(CreateJobDTO $createJobDTO): EmployeeJob
    {
        return $this->repository->createJob($createJobDTO->toArray());
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
        return $this->repository->getJob(
            id: $id,
        );
    }
}
