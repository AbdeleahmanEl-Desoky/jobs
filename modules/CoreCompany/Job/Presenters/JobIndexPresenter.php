<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Presenters;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyIndexPresenter;
use Modules\CoreUser\Skill\Models\Skill;
use Modules\CoreUser\Skill\Presenters\SkillPresenter;
use Modules\Shared\Category\Models\Category;
use Modules\Shared\Category\Presenters\CategoryPresenter;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;

class JobIndexPresenter extends AbstractPresenter
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
            'job_title' => $this->job->jobTitle ? (new JobTitlePresenter($this->job->jobTitle))->getData() : null,
            'type'=> $this->job->type,
            'company'=> $this->job->company ? (new CompanyIndexPresenter($this->job->company))->getData() : null,
        ];
    }
}
