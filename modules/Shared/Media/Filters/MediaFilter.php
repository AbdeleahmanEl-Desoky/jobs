<?php

declare(strict_types=1);

namespace Modules\Shared\Media\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class MediaFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
