<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Presenters;

use Modules\Shared\StatusEmployment\Models\StatusEmployment;
use BasePackage\Shared\Presenters\AbstractPresenter;

class StatusEmploymentPresenter extends AbstractPresenter
{
    private StatusEmployment $statusEmployment;

    public function __construct(StatusEmployment $statusEmployment)
    {
        $this->statusEmployment = $statusEmployment;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->statusEmployment->id,
            'name' => $this->statusEmployment->name,
            'code' => $this->statusEmployment->code,

        ];
    }
}
