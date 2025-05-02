<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Presenters;

use Modules\CoreUser\Skill\Models\Skill;
use BasePackage\Shared\Presenters\AbstractPresenter;

class SkillPresenter extends AbstractPresenter
{
    private Skill $skill;

    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->skill->id,
            'name' => $this->skill->name,
            'description' => $this->skill->description
        ];
    }
}
