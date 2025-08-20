<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Presenters;


use BasePackage\Shared\Presenters\AbstractPresenter;
use Modules\Shared\Skill\Models\Skill;

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
        ];
    }
}
