<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Handlers;

use Modules\CoreUser\UserSkill\Commands\UpdateSkillCommand;
use Modules\CoreUser\UserSkill\Repositories\SkillRepository;

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
