<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Handlers;

use Modules\CoreCompany\Company\Commands\UpdateCompanyCommand;
use Modules\CoreCompany\Company\Repositories\CompanyRepository;

class UpdateCompanyHandler
{
    public function __construct(
        private CompanyRepository $repository,
    ) {
    }

    public function handle(UpdateCompanyCommand $updateCompanyCommand)
    {
        $this->repository->updateCompany($updateCompanyCommand->getId(), $updateCompanyCommand->toArray());
    }
}
