<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\StatusEmployment\Models\StatusEmployment;

/**
 * @property StatusEmployment $model
 * @method StatusEmployment findOneOrFail($id)
 * @method StatusEmployment findOneByOrFail(array $data)
 */
class StatusEmploymentRepository extends BaseRepository
{
    public function __construct(StatusEmployment $model)
    {
        parent::__construct($model);
    }

    public function getStatusEmploymentList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getStatusEmployment(UuidInterface $id): StatusEmployment
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createStatusEmployment(array $data): StatusEmployment
    {
        return $this->create($data);
    }

    public function updateStatusEmployment(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteStatusEmployment(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
