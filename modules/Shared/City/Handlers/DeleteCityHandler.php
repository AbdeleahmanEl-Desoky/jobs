<?php

declare(strict_types=1);

namespace Modules\Shared\City\Handlers;

use Modules\Shared\City\Repositories\CityRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteCityHandler
{
    public function __construct(
        private CityRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteCity($id);
    }
}
