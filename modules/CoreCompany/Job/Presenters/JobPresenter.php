<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Presenters;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use BasePackage\Shared\Presenters\AbstractPresenter;

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
            'job_title_id' => $this->job->job_title_id,
            'position_description' => $this->job->position_description,
            'company_description' => $this->job->company_description,
            'skill_ids' => $this->job->skill_ids,
            'employee_description' => $this->job->employee_description,
            'team_description' => $this->job->team_description,
            'interview' => $this->job->interview,
            'salary_form' => $this->job->salary_form,
            'salary_to' => $this->job->salary_to,
            'pay' => $this->job->pay,
            'category_ids' => $this->job->category_ids,
            'type'=> $this->job->type,
        ];
    }
}
