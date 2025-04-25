<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Handlers;

use Modules\Shared\Country\Repositories\CountryRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteCountryHandler
{
    public function __construct(
        private CountryRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteCountry($id);
    }
}
