<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\Shared\CompanySize\Models\CompanySize;

/**
 * @property CompanySize $model
 * @method CompanySize findOneOrFail($id)
 * @method CompanySize findOneByOrFail(array $data)
 */
class CompanySizeRepository extends BaseRepository
{
    public function __construct(CompanySize $model)
    {
        parent::__construct($model);
    }

    public function getCompanySizeList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getCompanySize(UuidInterface $id): CompanySize
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createCompanySize(array $data): CompanySize
    {
        return $this->create($data);
    }

    public function updateCompanySize(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteCompanySize(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
