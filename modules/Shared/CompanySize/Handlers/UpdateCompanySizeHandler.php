<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Handlers;

use Modules\Shared\CompanySize\Commands\UpdateCompanySizeCommand;
use Modules\Shared\CompanySize\Repositories\CompanySizeRepository;

class UpdateCompanySizeHandler
{
    public function __construct(
        private CompanySizeRepository $repository,
    ) {
    }

    public function handle(UpdateCompanySizeCommand $updateCompanySizeCommand)
    {
        $this->repository->updateCompanySize($updateCompanySizeCommand->getId(), $updateCompanySizeCommand->toArray());
    }
}
