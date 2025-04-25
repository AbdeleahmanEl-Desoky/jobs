<?php

declare(strict_types=1);

namespace Modules\Shared\State\Services;

use Illuminate\Support\Collection;
use Modules\Shared\State\DTO\CreateStateDTO;
use Modules\Shared\State\Models\State;
use Modules\Shared\State\Repositories\StateRepository;
use Ramsey\Uuid\UuidInterface;

class StateCRUDService
{
    public function __construct(
        private StateRepository $repository,
    ) {
    }

    public function create(CreateStateDTO $createStateDTO): State
    {
         return $this->repository->createState($createStateDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): State
    {
        return $this->repository->getState(
            id: $id,
        );
    }
}
