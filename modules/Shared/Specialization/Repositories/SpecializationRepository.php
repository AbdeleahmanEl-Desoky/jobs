<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\Specialization\Models\Specialization;

/**
 * @property Specialization $model
 * @method Specialization findOneOrFail($id)
 * @method Specialization findOneByOrFail(array $data)
 */
class SpecializationRepository extends BaseRepository
{
    public function __construct(Specialization $model)
    {
        parent::__construct($model);
    }

    public function getSpecializationList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getSpecialization(UuidInterface $id): Specialization
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createSpecialization(array $data): Specialization
    {
        return $this->create($data);
    }

    public function updateSpecialization(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteSpecialization(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
