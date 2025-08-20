<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Handlers;

use Modules\Shared\Skill\Repositories\SkillRepository;
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
