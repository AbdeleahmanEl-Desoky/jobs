<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\Education\Models\Education;

/**
 * @property Education $model
 * @method Education findOneOrFail($id)
 * @method Education findOneByOrFail(array $data)
 */
class EducationRepository extends BaseRepository
{
    public function __construct(Education $model)
    {
        parent::__construct($model);
    }

    public function getEducationList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getEducation(UuidInterface $id): Education
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createEducation(array $data): Education
    {
        return $this->create($data);
    }

    public function updateEducation(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteEducation(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
