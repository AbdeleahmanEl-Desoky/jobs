<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Services;

use Illuminate\Support\Collection;
use Modules\Shared\StatusEmployment\DTO\CreateStatusEmploymentDTO;
use Modules\Shared\StatusEmployment\Models\StatusEmployment;
use Modules\Shared\StatusEmployment\Repositories\StatusEmploymentRepository;
use Ramsey\Uuid\UuidInterface;

class StatusEmploymentCRUDService
{
    public function __construct(
        private StatusEmploymentRepository $repository,
    ) {
    }

    public function create(CreateStatusEmploymentDTO $createStatusEmploymentDTO): StatusEmployment
    {
         return $this->repository->createStatusEmployment($createStatusEmploymentDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): StatusEmployment
    {
        return $this->repository->getStatusEmployment(
            id: $id,
        );
    }
}
