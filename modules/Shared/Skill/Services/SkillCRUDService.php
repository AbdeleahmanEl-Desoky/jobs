<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Services;

use Illuminate\Support\Collection;
use Modules\Shared\Skill\DTO\CreateSkillDTO;
use Modules\Shared\Skill\Models\Skill;
use Modules\Shared\Skill\Repositories\SkillRepository;
use Ramsey\Uuid\UuidInterface;

class SkillCRUDService
{
    public function __construct(
        private SkillRepository $repository,
    ) {
    }

    public function create(CreateSkillDTO $createSkillDTO): Skill
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

    public function get(UuidInterface $id): Skill
    {
        return $this->repository->getSkill(
            id: $id,
        );
    }
}
