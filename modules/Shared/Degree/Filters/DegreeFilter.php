<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class DegreeFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
