<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Presenters;

use Modules\CoreUser\UserSkill\Models\UserSkill;
use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\Skill\Presenters\SkillPresenter as PresentersSkillPresenter;

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
            'skill' => $this->skill->skill ? (new PresentersSkillPresenter($this->skill->skill))->getData() : null,
        ];
    }
}
