<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Presenters;

use Modules\Shared\Degree\Models\Degree;
use BasePackage\Shared\Presenters\AbstractPresenter;

class DegreePresenter extends AbstractPresenter
{
    private Degree $degree;

    public function __construct(Degree $degree)
    {
        $this->degree = $degree;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->degree->id,
            'name' => $this->degree->name,
        ];
    }
}
