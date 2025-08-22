<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Repositories;

use BasePackage\Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection; // Should be LengthAwarePaginator if using paginated()
use Ramsey\Uuid\UuidInterface;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreCompany\Job\DTO\CreateJobDTO; // Import CreateJobDTO
use Modules\CoreCompany\Job\Commands\UpdateJobCommand; // Import UpdateJobCommand

/**
 * @property EmployeeJob $model
 * @method EmployeeJob findOneOrFail($id)
 * @method EmployeeJob findOneByOrFail(array $data)
 */
class JobRepository extends BaseRepository
{
    public function __construct(EmployeeJob $model)
    {
        parent::__construct($model);
    }

    public function getJobList(?int $page, ?int $perPage = 10): array // Changed return to array as paginated returns array
    {
        // Add eager loading for relationships that presenters need (company, jobTitle, skills, categories etc.)
        // $this->model->with(['company', 'jobTitle', 'skills', 'categories']), // Eager load here
        return $this->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function getJob(UuidInterface $id): EmployeeJob
    {
        // Eager load for single item view
        return $this->findOneByOrFail([
            'id' => $id->toString(),
        ])->load(['company', 'jobTitle', 'skills', 'categories']); // Eager load here
    }

    public function createJob(CreateJobDTO $createJobDTO): EmployeeJob // Use DTO for type-hint
    {
        // Create the main EmployeeJob record
        $job = $this->create($createJobDTO->toArray());

        // Sync skills
        if (!empty($createJobDTO->skillIds)) {
            $job->skills()->sync($createJobDTO->skillIds);
        }

        // Sync categories
        if (!empty($createJobDTO->categoryIds)) {
            $job->categories()->sync($createJobDTO->categoryIds);
        }

        // Reload the job to include the newly synced relations in the returned object
        return $job->load(['skills', 'categories']);
    }

    public function updateJob(UuidInterface $id, UpdateJobCommand $command): bool // Use Command for type-hint
    {
        $job = $this->findOneOrFail($id);

        // Prepare data for the main job update (excluding relation IDs)
        $dataForUpdate = $command->toArray();

        // Update the main EmployeeJob record
        $updated = $job->update($dataForUpdate);

        // Sync skills if provided in the command
        if ($command->getSkillIds() !== null) { // Check for null to differentiate between empty array and not provided
            $job->skills()->sync($command->getSkillIds());
        }

        // Sync categories if provided in the command
        if ($command->getCategoryIds() !== null) {
            $job->categories()->sync($command->getCategoryIds());
        }

        return $updated;
    }

    public function deleteJob(UuidInterface $id): bool
    {
        $job = $this->findOneOrFail($id);

        // Detach relations before deleting the job itself
        $job->skills()->detach();
        $job->categories()->detach();

        return $this->delete($id);
    }
}
