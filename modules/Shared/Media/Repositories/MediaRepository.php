<?php

declare(strict_types=1);

namespace Modules\Shared\Media\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\Media\Models\Media;

/**
 * @property Media $model
 * @method Media findOneOrFail($id)
 * @method Media findOneByOrFail(array $data)
 */
class MediaRepository extends BaseRepository
{
    public function __construct(Media $model)
    {
        parent::__construct($model);
    }

    public function getMediaList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getMedia(UuidInterface $id): Media
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createMedia(array $data): Media
    {
        return $this->create($data);
    }

    public function updateMedia(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteMedia(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
