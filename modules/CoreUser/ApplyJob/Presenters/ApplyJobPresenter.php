<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Presenters;

use Modules\CoreUser\ApplyJob\Models\ApplyJob;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\CoreCompany\Company\Presenters\CompanyPresenter;
use Modules\CoreCompany\Job\Presenters\JobPresenter;
use Modules\CoreUser\User\Presenters\UserPresenter;
use Modules\Shared\Media\Presenters\MediaPresenter;

class ApplyJobPresenter extends AbstractPresenter
{
    private ApplyJob $applyJob;

    public function __construct(ApplyJob $applyJob)
    {
        $this->applyJob = $applyJob;
    }

    protected function present(bool $isListing = false): array
    {
        $cvFileMedia =$this->applyJob->getFirstMedia('cv_file');

        $additionalFileMedia = $this->applyJob->getFirstMedia('additional_file');
        return [
            'id' => $this->applyJob->id,
            'company' => $this->applyJob->company ?[
                'id' => $this->applyJob->company->id,
                'name' => $this->applyJob->company->name
            ]:null,
            'user' => $this->applyJob->user ?[
                'id' => $this->applyJob->user->id,
                'name' => $this->applyJob->user->name
            ]:null,
            'employee_job_id' => $this->applyJob->employee_job_id,
            'cover_letter' => $this->applyJob->cover_letter,
            'agree_privacy_policy' => (int) $this->applyJob->agree_privacy_policy,
            'agree_future_job' => (int) $this->applyJob->agree_future_job,
            'cv_file' => $cvFileMedia ? (new MediaPresenter($cvFileMedia))->getData() : null,
            'additional_file' => $additionalFileMedia ? (new MediaPresenter($additionalFileMedia))->getData() : null,
        ];
    }
}
