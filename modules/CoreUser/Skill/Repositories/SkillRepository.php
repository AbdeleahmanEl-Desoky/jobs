<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\Skill\Models\Skill;

/**
 * @property Skill $model
 * @method Skill findOneOrFail($id)
 * @method Skill findOneByOrFail(array $data)
 */
class SkillRepository extends BaseRepository
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function getSkillList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getSkill(UuidInterface $id): Skill
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createSkill(array $data): Skill
    {
        return $this->create($data);
    }

    public function updateSkill(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteSkill(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
