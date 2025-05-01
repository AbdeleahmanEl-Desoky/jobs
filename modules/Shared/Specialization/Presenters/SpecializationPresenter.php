<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Presenters;

use Modules\Shared\Specialization\Models\Specialization;
use BasePackage\Shared\Presenters\AbstractPresenter;

class SpecializationPresenter extends AbstractPresenter
{
    private Specialization $specialization;

    public function __construct(Specialization $specialization)
    {
        $this->specialization = $specialization;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->specialization->id,
            'name' => $this->specialization->name,
            'code' => $this->specialization->code,
        ];
    }
}
