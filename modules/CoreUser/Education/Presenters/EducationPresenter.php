<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Presenters;

use Modules\CoreUser\Education\Models\Education;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\Degree\Presenters\DegreePresenter;
use Modules\Shared\Field\Presenters\FieldPresenter;
use Modules\Shared\Specialization\Presenters\SpecializationPresenter;
use Modules\Shared\University\Presenters\UniversityPresenter;

class EducationPresenter extends AbstractPresenter
{
    private Education $education;

    public function __construct(Education $education)
    {
        $this->education = $education;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->education->id,

            'degree' => $this->education->degree ? (new DegreePresenter($this->education->degree))->getData() : null,
            'country'=> $this->education->country ? (new CountryPresenter($this->education->country))->getData() : null,
            'city'=> $this->education->city ? (new CityPresenter($this->education->city))->getData() : null,
            'field' => $this->education->field ? (new FieldPresenter($this->education->field))->getData() : null,
            'specialization' => $this->education->specialization ? (new SpecializationPresenter($this->education->specialization))->getData() : null,
            'university' => $this->education->university ? (new UniversityPresenter($this->education->university))->getData() : null,

            'date_from' => $this->education->date_from,
            'date_to' => $this->education->date_to,
            'graduation_grade_type' => $this->education->graduation_grade_type,
            'graduation_grade_value' => $this->education->graduation_grade_value,
            'description' => $this->education->description,
        ];
    }
}
