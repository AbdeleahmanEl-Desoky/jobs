<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class JobFilter extends SearchModelFilter
{
    public $relations = [];

    public function type($type)
    {
        return $this->where('type', $type);
    }
}
