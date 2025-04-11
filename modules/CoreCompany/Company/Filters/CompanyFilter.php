<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class CompanyFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
