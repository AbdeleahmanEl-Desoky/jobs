<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Presenters;

use Modules\CoreUser\User\Models\User;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;
use Modules\Shared\Media\Presenters\MediaPresenter;
use Modules\Shared\StatusEmployment\Presenters\StatusEmploymentPresenter;

class UserPresenter extends AbstractPresenter
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    protected function present(bool $isListing = false): array
    {
        $firstMediaUserProfile = $this->user->getFirstMedia('user_profile');
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'last_name'=> $this->user->last_name,
            'email'=> $this->user->email,
            'phone'=> $this->user->phone,
            'phonecode'=> $this->user->phoneCode ? (new CountryPresenter($this->user->phoneCode))->getData() : null,
            'country'=> $this->user->country ? (new CountryPresenter($this->user->country))->getData() : null,
            'city'=> $this->user->city ? (new CityPresenter($this->user->city))->getData() : null,
            'job_title' => $this->user->jobTitle ? (new JobTitlePresenter($this->user->jobTitle))->getData() : null,
            'postal_code'=> $this->user->postal_code,
            'minimum_salary_amount'=> $this->user->minimum_salary_amount,
            'payment_period'=> $this->user->payment_period,
            'about'=> $this->user->about,
            'status_employment_id'=>$this->user->statusEmployment ? (new StatusEmploymentPresenter($this->user->statusEmployment))->getData() : null,
            'cv_files' => MediaPresenter::collection($this->user->getMedia('user_cv')),
            'profile_file' => $firstMediaUserProfile ? (new MediaPresenter($firstMediaUserProfile))->getData() : null, 
            // 'files' => $firstMedia ? (new MediaPresenter($firstMedia))->getData() : null,
        ];
    }
}
