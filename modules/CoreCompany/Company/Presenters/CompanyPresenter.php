<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Presenters;

use Modules\CoreCompany\Company\Models\Company;
use BasePackage\Shared\Presenters\AbstractPresenter;

class CompanyPresenter extends AbstractPresenter
{
    private Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->company->id,
            'name' => $this->company->name,
        ];
    }
}
