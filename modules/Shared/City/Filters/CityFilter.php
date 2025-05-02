<?php

declare(strict_types=1);

namespace Modules\Shared\City\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class CityFilter extends SearchModelFilter
{
    public $relations = [];

    public function name($name)
    {
        return $this->whereHas('translations',function($q) use ($name){
            $q->where('content','like','%'.$name.'%');
        });
    }

    public function country($countryId)
    {
        return $this->where('country_id', $countryId);
    }

}
