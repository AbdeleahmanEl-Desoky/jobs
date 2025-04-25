<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Presenters;

use Modules\Shared\CompanySize\Models\CompanySize;
use BasePackage\Shared\Presenters\AbstractPresenter;

class CompanySizePresenter extends AbstractPresenter
{
    private CompanySize $companySize;

    public function __construct(CompanySize $companySize)
    {
        $this->companySize = $companySize;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->companySize->id,
            'name' => $this->companySize->name,
        ];
    }
}
