<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class ExperienceFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
