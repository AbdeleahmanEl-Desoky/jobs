<?php

declare(strict_types=1);

namespace Modules\Shared\State\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\State\Models\State;

/**
 * @property State $model
 * @method State findOneOrFail($id)
 * @method State findOneByOrFail(array $data)
 */
class StateRepository extends BaseRepository
{
    public function __construct(State $model)
    {
        parent::__construct($model);
    }

    public function getStateList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getState(UuidInterface $id): State
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createState(array $data): State
    {
        return $this->create($data);
    }

    public function updateState(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteState(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
