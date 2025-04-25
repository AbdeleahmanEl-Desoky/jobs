<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Presenters;

use Modules\Shared\Country\Models\Country;
use BasePackage\Shared\Presenters\AbstractPresenter;

class CountryPresenter extends AbstractPresenter
{
    private Country $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->country->id,
            'name' => $this->country->name,
        ];
    }
}
