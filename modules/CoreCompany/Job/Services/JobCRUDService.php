<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Services;

use Modules\CoreCompany\Job\DTO\CreateJobDTO;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreCompany\Job\Repositories\JobRepository;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreCompany\Job\Commands\UpdateJobCommand; // Import UpdateJobCommand

class JobCRUDService
{
    public function __construct(
        private JobRepository $repository,
    ) {}

    public function create(CreateJobDTO $createJobDTO): EmployeeJob // Pass DTO
    {
        return $this->repository->createJob($createJobDTO); // Pass the DTO object
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            // ['company_id' => auth('api_company')->user()->id], // Move this filter to repository or filter class
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

    public function update(UpdateJobCommand $command): bool // Pass Command and return bool
    {
        return $this->repository->updateJob($command->getId(), $command); // Pass the command object
    }
}
