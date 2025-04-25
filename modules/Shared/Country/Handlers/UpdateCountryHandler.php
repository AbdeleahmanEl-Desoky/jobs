<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Handlers;

use Modules\Shared\Country\Commands\UpdateCountryCommand;
use Modules\Shared\Country\Repositories\CountryRepository;

class UpdateCountryHandler
{
    public function __construct(
        private CountryRepository $repository,
    ) {
    }

    public function handle(UpdateCountryCommand $updateCountryCommand)
    {
        $this->repository->updateCountry($updateCountryCommand->getId(), $updateCountryCommand->toArray());
    }
}
