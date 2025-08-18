<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\CoreUser\ApplyJob\Commands\ArchiveApplyJobCommand;
use Ramsey\Uuid\UuidInterface;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;

/**
 * @property ApplyJob $model
 * @method ApplyJob findOneOrFail($id)
 * @method ApplyJob findOneByOrFail(array $data)
 */
class ApplyJobRepository extends BaseRepository
{
    public function __construct(ApplyJob $model)
    {
        parent::__construct($model);
    }

    public function getApplyJobList(?int $page, ?int $perPage = 10): Collection
    {
        return $this->paginatedList([], $page, $perPage);
    }

    public function getApplyJob(UuidInterface $id): ApplyJob
    {
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ]);
    }

    public function createApplyJob(array $data): ApplyJob
    {
        return $this->create($data);
    }

    public function updateApplyJob(UuidInterface $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteApplyJob(UuidInterface $id): bool
    {
        return $this->delete($id);
    }
}
