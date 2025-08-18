<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Presenters;

use Modules\CoreUser\Saved\Models\Saved;
use BasePackage\Shared\Presenters\AbstractPresenter;

class SavedPresenter extends AbstractPresenter
{
    private Saved $saved;

    public function __construct(Saved $saved)
    {
        $this->saved = $saved;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->saved->id,
            'name' => $this->saved->name,
        ];
    }
}
