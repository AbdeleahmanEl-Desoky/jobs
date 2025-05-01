<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\Education\DTO\CreateEducationDTO;
use Modules\CoreUser\Education\Models\Education;
use Modules\CoreUser\Education\Repositories\EducationRepository;
use Ramsey\Uuid\UuidInterface;

class EducationCRUDService
{
    public function __construct(
        private EducationRepository $repository,
    ) {
    }

    public function create(CreateEducationDTO $createEducationDTO): Education
    {
         return $this->repository->createEducation($createEducationDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Education
    {
        return $this->repository->getEducation(
            id: $id,
        );
    }
}
