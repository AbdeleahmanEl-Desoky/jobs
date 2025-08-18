<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\Saved\Models\Saved;

/**
 * @property Saved $model
 * @method Saved findOneOrFail($id)
 * @method Saved findOneByOrFail(array $data)
 */
class SavedRepository extends BaseRepository
{
    public function __construct(Saved $model)
    {
        parent::__construct($model);
    }

    public function getSavedList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getSaved(UuidInterface $id): Saved
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createSaved(array $data): Saved
    {
        return $this->create($data);
    }

    public function updateSaved(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteSaved(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
