<?php

declare(strict_types=1);

namespace Modules\Shared\City\Presenters;

use Modules\Shared\City\Models\City;
use BasePackage\Shared\Presenters\AbstractPresenter;

class CityPresenter extends AbstractPresenter
{
    private City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->city->id,
            'name' => $this->city->name,
        ];
    }
}
