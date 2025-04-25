<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\Field\Models\Field;

/**
 * @property Field $model
 * @method Field findOneOrFail($id)
 * @method Field findOneByOrFail(array $data)
 */
class FieldRepository extends BaseRepository
{
    public function __construct(Field $model)
    {
        parent::__construct($model);
    }

    public function getFieldList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getField(UuidInterface $id): Field
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createField(array $data): Field
    {
        return $this->create($data);
    }

    public function updateField(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteField(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
