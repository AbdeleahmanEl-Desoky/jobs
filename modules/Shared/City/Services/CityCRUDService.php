<?php

declare(strict_types=1);

namespace Modules\Shared\City\Services;

use Illuminate\Support\Collection;
use Modules\Shared\City\DTO\CreateCityDTO;
use Modules\Shared\City\Models\City;
use Modules\Shared\City\Repositories\CityRepository;
use Ramsey\Uuid\UuidInterface;

class CityCRUDService
{
    public function __construct(
        private CityRepository $repository,
    ) {
    }

    public function create(CreateCityDTO $createCityDTO): City
    {
         return $this->repository->createCity($createCityDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): City
    {
        return $this->repository->getCity(
            id: $id,
        );
    }
}
