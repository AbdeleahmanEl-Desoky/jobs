<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\Country\Models\Country;

/**
 * @property Country $model
 * @method Country findOneOrFail($id)
 * @method Country findOneByOrFail(array $data)
 */
class CountryRepository extends BaseRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

    public function getCountryList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getCountry(UuidInterface $id): Country
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createCountry(array $data): Country
    {
        return $this->create($data);
    }

    public function updateCountry(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteCountry(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
