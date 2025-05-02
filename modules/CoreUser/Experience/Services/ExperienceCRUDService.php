<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\Experience\DTO\CreateExperienceDTO;
use Modules\CoreUser\Experience\Models\Experience;
use Modules\CoreUser\Experience\Repositories\ExperienceRepository;
use Ramsey\Uuid\UuidInterface;

class ExperienceCRUDService
{
    public function __construct(
        private ExperienceRepository $repository,
    ) {
    }

    public function create(CreateExperienceDTO $createExperienceDTO): Experience
    {
         return $this->repository->createExperience($createExperienceDTO->toArray());
    }

    public function list(UuidInterface $userId ,int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            ['user_id' => $userId],
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Experience
    {
        return $this->repository->getExperience(
            id: $id,
        );
    }
}
