<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Services;

use Illuminate\Support\Collection;
use Modules\Shared\CompanySize\DTO\CreateCompanySizeDTO;
use Modules\Shared\CompanySize\Models\CompanySize;
use Modules\Shared\CompanySize\Repositories\CompanySizeRepository;
use Ramsey\Uuid\UuidInterface;

class CompanySizeCRUDService
{
    public function __construct(
        private CompanySizeRepository $repository,
    ) {
    }

    public function create(CreateCompanySizeDTO $createCompanySizeDTO): CompanySize
    {
         return $this->repository->createCompanySize($createCompanySizeDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): CompanySize
    {
        return $this->repository->getCompanySize(
            id: $id,
        );
    }
}
