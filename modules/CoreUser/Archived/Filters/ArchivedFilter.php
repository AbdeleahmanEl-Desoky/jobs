<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class ArchivedFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
