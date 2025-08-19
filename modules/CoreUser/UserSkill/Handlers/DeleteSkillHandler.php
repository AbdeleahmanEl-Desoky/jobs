<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Handlers;

use Modules\CoreUser\UserSkill\Repositories\SkillRepository;
use Ramsey\Uuid\UuidInterface;

class DeleteSkillHandler
{
    public function __construct(
        private SkillRepository $repository,
    ) {
    }

    public function handle(UuidInterface $id)
    {
        $this->repository->deleteSkill($id);
    }
}
