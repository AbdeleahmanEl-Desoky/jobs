<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Presenters;

use Modules\CoreUser\UserJob\Models\UserJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyIndexPresenter;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreUser\ApplyJob\Presenters\ApplyJobPresenter;
use Modules\Shared\Skill\Models\Skill;
use Modules\Shared\Category\Models\Category;
use Modules\Shared\Category\Presenters\CategoryPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;
use Modules\Shared\Skill\Presenters\SkillPresenter;

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
            'job_title' => $this->job->jobTitle? (new JobTitlePresenter($this->job->jobTitle))->getData() : null,
            'type'=> $this->job->type,
            'is_archived' => $isArchived,
            'is_saved' => $isSaved,
            'is_applyed' => $this->job->applyJobUser ? 1 : 0,
            'position_description' => $this->job->position_description,
            'company_description' => $this->job->company_description,
            'company' => $this->job->company ? (new CompanyIndexPresenter($this->job->company))->getData() : null,
            'employee_description' => $this->job->employee_description,
            'team_description' => $this->job->team_description,
            'interview' => $this->job->interview,
            'salary_form' => $this->job->salary_form,
            'salary_to' => $this->job->salary_to,
            'pay' => $this->job->pay,
            'skills' => SkillPresenter::collection($this->job->skills),
            'categories' => CategoryPresenter::collection($this->job->categories),
            'status' => $this->job->status,
            'country' => $this->job->country? (new CountryPresenter($this->job->country))->getData() : null,
            'city' => $this->job->city ? (new CityPresenter($this->job->city))->getData() : null,
        ];
    }
}
