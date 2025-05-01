<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Services;

use Illuminate\Support\Collection;
use Modules\Shared\Degree\DTO\CreateDegreeDTO;
use Modules\Shared\Degree\Models\Degree;
use Modules\Shared\Degree\Repositories\DegreeRepository;
use Ramsey\Uuid\UuidInterface;

class DegreeCRUDService
{
    public function __construct(
        private DegreeRepository $repository,
    ) {
    }

    public function create(CreateDegreeDTO $createDegreeDTO): Degree
    {
         return $this->repository->createDegree($createDegreeDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Degree
    {
        return $this->repository->getDegree(
            id: $id,
        );
    }
}
