<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Handlers;

use Modules\CoreUser\User\Commands\UpdateUserCommand;
use Modules\CoreUser\User\Repositories\UserRepository;

class UpdateUserHandler
{
    public function __construct(
        private UserRepository $repository,
    ) {
    }

    public function handle(UpdateUserCommand $updateUserCommand)
    {
        $this->repository->updateUser($updateUserCommand->getId(), $updateUserCommand->toArray());
    }
}
