<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Presenters;

use Modules\CoreUser\UserJob\Models\UserJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyIndexPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyPresenter;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreUser\ApplyJob\Presenters\ApplyJobPresenter;
use Modules\CoreUser\Skill\Models\Skill;
use Modules\CoreUser\Skill\Presenters\SkillPresenter;
use Modules\Shared\Category\Models\Category;
use Modules\Shared\Category\Presenters\CategoryPresenter;

class UserJobPresenter extends AbstractPresenter
{
    private EmployeeJob $job;

    public function __construct(EmployeeJob $job)
    {
        $this->job = $job;
    }

    protected function present(bool $isListing = false): array
    {
        $isArchived = $this->job->archive ? 1:0;
        $isSaved = $this->job->userSave ? 1:0;
        return [
            'id' => $this->job->id,
            'job_title_id' => $this->job->job_title_id,
            'is_archived' => $isArchived,
            'is_saved' => $isSaved,
            'position_description' => $this->job->position_description,
            'company_description' => $this->job->company_description,
            'company' => $this->job->company ? (new CompanyIndexPresenter($this->job->company))->getData() : null,
            'skills' => $this->job->skills()
                ->map(fn (Skill $skill) => (new SkillPresenter($skill))->getData())
                ->toArray(),
            'employee_description' => $this->job->employee_description,
            'team_description' => $this->job->team_description,
            'interview' => $this->job->interview,
            'salary_form' => $this->job->salary_form,
            'salary_to' => $this->job->salary_to,
            'pay' => $this->job->pay,
            'categories' => $this->job->categories()
                ->map(fn (Category $category) => (new CategoryPresenter($category))->getData())
                ->toArray(),
            'type'=> $this->job->type,
            'apply_job' => $this->job->applyJobUser ? (new ApplyJobPresenter($this->job->applyJobUser))->getData() : null
        ];
    }
}
