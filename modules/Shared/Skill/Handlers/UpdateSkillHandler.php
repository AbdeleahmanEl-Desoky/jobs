<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Handlers;

use Modules\Shared\Skill\Commands\UpdateSkillCommand;
use Modules\Shared\Skill\Repositories\SkillRepository;

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
