<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Handlers;

use Modules\Shared\CompanySize\Repositories\CompanySizeRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteCompanySizeHandler
{
    public function __construct(
        private CompanySizeRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteCompanySize($id);
    }
}
