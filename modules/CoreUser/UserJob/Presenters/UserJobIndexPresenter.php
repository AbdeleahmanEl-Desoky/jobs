<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Presenters;

use Modules\CoreUser\UserJob\Models\UserJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyIndexPresenter;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
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
        $isArchived = $this->job->archive ? 1:0;
        $isSaved = $this->job->userSave ? 1:0;
        return [
            'id' => $this->job->id,
            'job_title' => $this->job->jobTitle ? (new JobTitlePresenter($this->job->jobTitle))->getData() : null,
            'is_archived' => $isArchived,
            'is_saved' => $isSaved,
            'is_applyed' => $this->job->applyJobUser ? 1 : 0,
            'type'=> $this->job->type,
            'country' => $this->job->country? (new CountryPresenter($this->job->country))->getData() : null,
            'city' => $this->job->city ? (new CityPresenter($this->job->city))->getData() : null,
            'company'=> $this->job->company ? (new CompanyIndexPresenter($this->job->company))->getData() : null,
        ];
    }
}
