<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class SkillFilter extends SearchModelFilter
{
       public $relations = [];

        public function name($name)
        {
            return $this->where('name', $name);
        }
}
