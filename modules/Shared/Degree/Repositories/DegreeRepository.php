<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\Degree\Models\Degree;

/**
 * @property Degree $model
 * @method Degree findOneOrFail($id)
 * @method Degree findOneByOrFail(array $data)
 */
class DegreeRepository extends BaseRepository
{
    public function __construct(Degree $model)
    {
        parent::__construct($model);
    }

    public function getDegreeList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getDegree(UuidInterface $id): Degree
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createDegree(array $data): Degree
    {
        return $this->create($data);
    }

    public function updateDegree(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteDegree(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
