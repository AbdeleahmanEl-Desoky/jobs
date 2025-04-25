<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Services;

use Illuminate\Support\Collection;
use Modules\Shared\Country\DTO\CreateCountryDTO;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\Country\Repositories\CountryRepository;
use Ramsey\Uuid\UuidInterface;

class CountryCRUDService
{
    public function __construct(
        private CountryRepository $repository,
    ) {
    }

    public function create(CreateCountryDTO $createCountryDTO): Country
    {
         return $this->repository->createCountry($createCountryDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Country
    {
        return $this->repository->getCountry(
            id: $id,
        );
    }
}
