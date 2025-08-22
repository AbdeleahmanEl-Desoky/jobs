<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Presenters;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyIndexPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
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
            'country' => $this->job->country? (new CountryPresenter($this->job->country))->getData() : null,
            'city' => $this->job->city ? (new CityPresenter($this->job->city))->getData() : null,
        ];
    }
}
