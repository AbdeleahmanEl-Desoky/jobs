<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Presenters;

use Modules\CoreUser\Experience\Models\Experience;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\CompanySize\Presenters\CompanySizePresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\Field\Presenters\FieldPresenter;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;

class ExperiencePresenter extends AbstractPresenter
{
    private Experience $experience;

    public function __construct(Experience $experience)
    {
        $this->experience = $experience;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->experience->id,
            'position_title' => $this->experience->position_title,
            'company_name' => $this->experience->company_name,
            'company_field' => $this->experience->companyField ? (new FieldPresenter($this->experience->companyField))->getData() : null,
            'company_size' => $this->experience->companySize ? (new CompanySizePresenter($this->experience->companySize))->getData() : null,
            'job_title' => $this->experience->jobTitle ? (new JobTitlePresenter($this->experience->jobTitle))->getData() : null,
            'country' => $this->experience->country ? (new CountryPresenter($this->experience->country))->getData() : null,
            'city' => $this->experience->city ? (new CityPresenter($this->experience->city))->getData() : null,
            'field' => $this->experience->field ? (new FieldPresenter($this->experience->field))->getData() : null,
            'date_from' => $this->experience->date_from,
            'date_to' => $this->experience->date_to,
            'description' => $this->experience->description,
            'find_job' => $this->experience->find_job,
        ];
    }
}
