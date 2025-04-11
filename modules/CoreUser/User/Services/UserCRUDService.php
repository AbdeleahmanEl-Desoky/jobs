<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\User\DTO\CreateUserDTO;
use Modules\CoreUser\User\Models\User;
use Modules\CoreUser\User\Repositories\UserRepository;
use Ramsey\Uuid\UuidInterface;

class UserCRUDService
{
    public function __construct(
        private UserRepository $repository,
    ) {
    }

    public function create(CreateUserDTO $createUserDTO): User
    {
         return $this->repository->createUser($createUserDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): User
    {
        return $this->repository->getUser(
            id: $id,
        );
    }
}
