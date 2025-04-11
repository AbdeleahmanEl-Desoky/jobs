<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Handlers;

use Modules\CoreCompany\Company\Repositories\CompanyRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteCompanyHandler
{
    public function __construct(
        private CompanyRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteCompany($id);
    }
}
