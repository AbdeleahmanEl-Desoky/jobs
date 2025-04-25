<?php

declare(strict_types=1);

namespace Modules\Shared\City\Handlers;

use Modules\Shared\City\Commands\UpdateCityCommand;
use Modules\Shared\City\Repositories\CityRepository;

class UpdateCityHandler
{
    public function __construct(
        private CityRepository $repository,
    ) {
    }

    public function handle(UpdateCityCommand $updateCityCommand)
    {
        $this->repository->updateCity($updateCityCommand->getId(), $updateCityCommand->toArray());
    }
}
