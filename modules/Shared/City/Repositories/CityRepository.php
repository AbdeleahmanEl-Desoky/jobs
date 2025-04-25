<?php

declare(strict_types=1);

namespace Modules\Shared\City\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\City\Models\City;

/**
 * @property City $model
 * @method City findOneOrFail($id)
 * @method City findOneByOrFail(array $data)
 */
class CityRepository extends BaseRepository
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function getCityList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getCity(UuidInterface $id): City
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createCity(array $data): City
    {
        return $this->create($data);
    }

    public function updateCity(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteCity(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
