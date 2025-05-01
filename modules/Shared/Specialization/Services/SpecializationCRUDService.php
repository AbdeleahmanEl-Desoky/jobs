<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Services;

use Illuminate\Support\Collection;
use Modules\Shared\Specialization\DTO\CreateSpecializationDTO;
use Modules\Shared\Specialization\Models\Specialization;
use Modules\Shared\Specialization\Repositories\SpecializationRepository;
use Ramsey\Uuid\UuidInterface;

class SpecializationCRUDService
{
    public function __construct(
        private SpecializationRepository $repository,
    ) {
    }

    public function create(CreateSpecializationDTO $createSpecializationDTO): Specialization
    {
         return $this->repository->createSpecialization($createSpecializationDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Specialization
    {
        return $this->repository->getSpecialization(
            id: $id,
        );
    }
}
