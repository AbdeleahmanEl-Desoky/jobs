<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Handlers;

use Modules\CoreUser\Skill\Commands\UpdateSkillCommand;
use Modules\CoreUser\Skill\Repositories\SkillRepository;

class UpdateSkillHandler
{
    public function __construct(
        private SkillRepository $repository,
    ) {
    }

    public function handle(UpdateSkillCommand $updateSkillCommand)
    {
        $this->repository->updateSkill($updateSkillCommand->getId(), $updateSkillCommand->toArray());
    }
}
