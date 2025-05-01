<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class SpecializationFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
