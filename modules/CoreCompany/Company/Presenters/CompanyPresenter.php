<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Presenters;

use Modules\CoreCompany\Company\Models\Company;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\Field\Presenters\FieldPresenter;
use Modules\Shared\Media\Presenters\MediaPresenter;

class CompanyPresenter extends AbstractPresenter
{
    private Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    protected function present(bool $isListing = false): array
    {
        $firstMediaUserProfile = $this->company->getFirstMedia('company_profile');
        return [
            'id' => $this->company->id,
            'name' => $this->company->name,
            'email' => $this->company->email,
            'phone' => $this->company->phone,
            'postal_code' => $this->company->postal_code,
            'minimum_salary_amount' => $this->company->minimum_salary_amount,
            'payment_period' => $this->company->payment_period,
            'about' => $this->company->about,
            'type' => $this->company->type,
            'company_size' => $this->company->companySize,
            'field' => $this->company->field ? (new FieldPresenter($this->company->field))->getData() : null,
            'phonecode'=> $this->company->phoneCode ? (new CountryPresenter($this->company->phoneCode))->getData() : null,
            'country'=> $this->company->country ? (new CountryPresenter($this->company->country))->getData() : null,
            'city'=> $this->company->city ? (new CityPresenter($this->company->city))->getData() : null,
            'profile_file' => $firstMediaUserProfile ? (new MediaPresenter($firstMediaUserProfile))->getData() : null,
        ];
    }
}
