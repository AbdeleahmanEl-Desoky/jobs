<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\Experience\Models\Experience;

/**
 * @property Experience $model
 * @method Experience findOneOrFail($id)
 * @method Experience findOneByOrFail(array $data)
 */
class ExperienceRepository extends BaseRepository
{
    public function __construct(Experience $model)
    {
        parent::__construct($model);
    }

    public function getExperienceList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getExperience(UuidInterface $id): Experience
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createExperience(array $data): Experience
    {
        return $this->create($data);
    }

    public function updateExperience(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteExperience(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
