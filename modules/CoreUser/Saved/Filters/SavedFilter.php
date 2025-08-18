<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class SavedFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
