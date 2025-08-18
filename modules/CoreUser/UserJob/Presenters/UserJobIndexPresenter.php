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
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;

class UserJobIndexPresenter extends AbstractPresenter
{
    private EmployeeJob $job;

    public function __construct(EmployeeJob $job)
    {
        $this->job = $job;
    }

    protected function present(bool $isListing = false): array
    {
        $isArchived = $this->job->archives->isNotEmpty() ? 1 : 0;

        return [
            'id' => $this->job->id,
            'job_title' => $this->job->jobTitle ? (new JobTitlePresenter($this->job->jobTitle))->getData() : null,
            'is_archived' => $isArchived,
            'type'=> $this->job->type,
            'company'=> $this->job->company ? (new CompanyIndexPresenter($this->job->company))->getData() : null,
        ];
    }
}
