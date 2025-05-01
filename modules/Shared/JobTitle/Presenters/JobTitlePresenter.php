<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Presenters;

use Modules\Shared\JobTitle\Models\JobTitle;
use BasePackage\Shared\Presenters\AbstractPresenter;

class JobTitlePresenter extends AbstractPresenter
{
    private JobTitle $jobTitle;

    public function __construct(JobTitle $jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->jobTitle->id,
            'name' => $this->jobTitle->name,
            'code' => $this->jobTitle->code,
        ];
    }
}
