<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\ApplyJob\DTO\CreateApplyJobDTO;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;
use Modules\CoreUser\ApplyJob\Repositories\ApplyJobRepository;
use Ramsey\Uuid\UuidInterface;

class ApplyJobCRUDService
{
    public function __construct(
        private ApplyJobRepository $repository,
    ) {
    }

    public function create(CreateApplyJobDTO $createApplyJobDTO): ApplyJob
    {
        $applyJob = $this->repository->createApplyJob($createApplyJobDTO->toArray());

        $cvFile = $createApplyJobDTO->getCvFile();
        $additionalFile = $createApplyJobDTO->getAdditionalFile();

        if($cvFile){
            $applyJob->addMedia($cvFile)->toMediaCollection('cv_file');
        }

        if($additionalFile){
            $applyJob->addMedia($additionalFile)->toMediaCollection('additional_file');
        }

        return $applyJob;
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): ApplyJob
    {
        return $this->repository->getApplyJob(
            id: $id,
        );
    }
}
