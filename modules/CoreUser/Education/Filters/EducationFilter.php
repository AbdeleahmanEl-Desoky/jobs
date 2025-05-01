<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class EducationFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
