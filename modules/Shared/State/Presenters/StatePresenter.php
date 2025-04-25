<?php

declare(strict_types=1);

namespace Modules\Shared\State\Presenters;

use Modules\Shared\State\Models\State;
use BasePackage\Shared\Presenters\AbstractPresenter;

class StatePresenter extends AbstractPresenter
{
    private State $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->state->id,
            'name' => $this->state->name,
        ];
    }
}
