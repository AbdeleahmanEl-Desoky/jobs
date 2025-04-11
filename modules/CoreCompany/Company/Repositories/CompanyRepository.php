<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreCompany\Company\Models\Company;

/**
 * @property Company $model
 * @method Company findOneOrFail($id)
 * @method Company findOneByOrFail(array $data)
 */
class CompanyRepository extends BaseRepository
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function getCompanyList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getCompany(UuidInterface $id): Company
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function getCompanyByEmail(string $email): ?Company
    {
        return $this->model->where('email', $email)->first();
    }

    public function createCompany(array $data): Company
    {
        return $this->create($data);
    }

    public function updateCompany(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }
    public function updateData(array $conditions, array $data)
    {
        return $this->updateWhere($conditions, $data);
    }
    public function deleteCompany(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
