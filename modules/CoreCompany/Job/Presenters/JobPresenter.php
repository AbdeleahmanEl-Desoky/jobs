<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Presenters;

use Modules\CoreCompany\Job\Models\EmployeeJob;
use BasePackage\Shared\Presenters\AbstractPresenter;

class JobPresenter extends AbstractPresenter
{
    private Job $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->job->id,
            'name' => $this->job->name,
        ];
    }
}
