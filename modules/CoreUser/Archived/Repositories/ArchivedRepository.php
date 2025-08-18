<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\Archived\Models\Archived;

/**
 * @property Archived $model
 * @method Archived findOneOrFail($id)
 * @method Archived findOneByOrFail(array $data)
 */
class ArchivedRepository extends BaseRepository
{
    public function __construct(Archived $model)
    {
        parent::__construct($model);
    }

    public function getArchivedList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getArchived(UuidInterface $id): Archived
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createArchived(array $data): Archived
    {
        return $this->create($data);
    }

    public function updateArchived(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteArchived(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
