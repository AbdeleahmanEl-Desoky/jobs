<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class JobFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
