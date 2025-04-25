<?php

declare(strict_types=1);

namespace Modules\Shared\City\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class CityFilter extends SearchModelFilter
{
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', $name);
    }

    public function countryId($countryId)
    {
        return $this->where('country_id', $countryId);
    }

}
