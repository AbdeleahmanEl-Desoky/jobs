<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Presenters;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyPresenter;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;
use Modules\CoreUser\ApplyJob\Presenters\ApplyJobPresenter;
use Modules\Shared\Skill\Presenters\SkillPresenter;
use Modules\Shared\Category\Presenters\CategoryPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;

class JobPresenter extends AbstractPresenter
{
    private EmployeeJob $job;

    public function __construct(EmployeeJob $job)
    {
        $this->job = $job;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->job->id,
            'job_title' => $this->job->jobTitle? (new JobTitlePresenter($this->job->jobTitle))->getData() : null,
            'position_description' => $this->job->position_description,
            'company_description' => $this->job->company_description,
            'skills' => SkillPresenter::collection($this->job->skills),
            'categories' => CategoryPresenter::collection($this->job->categories),
            'employee_description' => $this->job->employee_description,
            'team_description' => $this->job->team_description,
            'interview' => $this->job->interview,
            'salary_form' => $this->job->salary_form,
            'salary_to' => $this->job->salary_to,
            'pay' => $this->job->pay,
            'marke' => $this->job->marke,
            'type'=> $this->job->type,
            'status' => $this->job->status,
            'country' => $this->job->country? (new CountryPresenter($this->job->country))->getData() : null,
            'city' => $this->job->city ? (new CityPresenter($this->job->city))->getData() : null,
            'applyJob' => ApplyJobPresenter::collection($this->job->applyJobCompany),
        ];
    }
}
