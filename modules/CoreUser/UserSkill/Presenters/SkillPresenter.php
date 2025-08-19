<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Presenters;

use Modules\CoreUser\UserSkill\Models\UserSkill;
use BasePackage\Shared\Presenters\AbstractPresenter;

class SkillPresenter extends AbstractPresenter
{
    private UserSkill $skill;

    public function __construct(UserSkill $skill)
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
