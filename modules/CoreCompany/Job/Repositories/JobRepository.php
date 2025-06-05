<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreCompany\Job\Models\Job;

/**
 * @property Job $model
 * @method Job findOneOrFail($id)
 * @method Job findOneByOrFail(array $data)
 */
class JobRepository extends BaseRepository
{
    public function __construct(Job $model)
    {
        parent::__construct($model);
    }

    public function getJobList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getJob(UuidInterface $id): Job
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createJob(array $data): Job
    {
        return $this->create($data);
    }

    public function updateJob(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteJob(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
