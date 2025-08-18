<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreUser\UserJob\Commands\ArchiveJobCommand;
use Modules\CoreUser\UserJob\Commands\SaveJobCommand;
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

    public function archiveJob(UuidInterface $id , ArchiveJobCommand $command)
    {
        $applyJob = $this->getUserJob($id);
        $existingArchive =$applyJob->archive;

        if ($existingArchive) {
            $existingArchive->delete();
            return false;
        } else {
            $applyJob->archive()->create([
                'user_id' => $command->getUserId(),
                'reason' => $command->getReason(),
                'archived_at' => Carbon::now(),
            ]);
            return true;
        }
    }

    public function saveJob(UuidInterface $id , SaveJobCommand $command)
    {
        $applyJob = $this->getUserJob($id);
        $existingSave =$applyJob->userSave;

        if ($existingSave) {
            $existingSave->delete();
            return false;
        } else {
            $applyJob->userSave()->create([
                'user_id' => $command->getUserId(),
                'saved_at' => Carbon::now(),
            ]);
            return true;
        }
    }


}
