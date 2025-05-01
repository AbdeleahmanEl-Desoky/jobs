<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class StatusEmploymentFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
