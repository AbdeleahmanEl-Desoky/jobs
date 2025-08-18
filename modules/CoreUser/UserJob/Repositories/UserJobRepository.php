<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\UserJob\Models\UserJob;

/**
 * @property EmployeeJob $model
 * @method UserJob findOneOrFail($id)
 * @method UserJob findOneByOrFail(array $data)
 */
class UserJobRepository extends BaseRepository
{
    public function __construct(EmployeeJob $model)
    {
        parent::__construct($model);
    }

    public function getUserJobList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getUserJob(UuidInterface $id): EmployeeJob
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }
}
