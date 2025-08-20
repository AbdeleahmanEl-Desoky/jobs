<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\UserSkill\Models\UserSkill;
use Modules\Shared\Skill\Models\Skill;

/**
 * @property UserSkill $model
 * @method Skill findOneOrFail($id)
 * @method Skill findOneByOrFail(array $data)
 */
class SkillRepository extends BaseRepository
{
    public function __construct(UserSkill $model)
    {
        parent::__construct($model);
    }

    public function getSkillList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getSkill(UuidInterface $id): UserSkill
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createSkill(array $data): UserSkill
    {
        if($data['name'] != null){
            Skill::create($data);
            $data['skill_id'] = Skill::where('name',$data['name'])->first()->id;
        }

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
