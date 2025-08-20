<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\UserSkill\DTO\CreateSkillDTO;
use Modules\CoreUser\UserSkill\Models\UserSkill;
use Modules\CoreUser\UserSkill\Repositories\SkillRepository;
use Ramsey\Uuid\UuidInterface;

class SkillCRUDService
{
    public function __construct(
        private SkillRepository $repository,
    ) {
    }

    public function create(CreateSkillDTO $createSkillDTO): UserSkill
    {
         return $this->repository->createSkill($createSkillDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): UserSkill
    {
        return $this->repository->getSkill(
            id: $id,
        );
    }
}
