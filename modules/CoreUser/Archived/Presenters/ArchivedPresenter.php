<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Presenters;

use Modules\CoreUser\Archived\Models\Archived;
use BasePackage\Shared\Presenters\AbstractPresenter;

class ArchivedPresenter extends AbstractPresenter
{
    private Archived $archived;

    public function __construct(Archived $archived)
    {
        $this->archived = $archived;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->archived->id,
            'name' => $this->archived->name,
        ];
    }
}
